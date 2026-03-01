<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColocationRequest;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\joinColloc;
use App\Models\Membership;
use App\Models\settlement;
use App\Models\User;
use App\Services\InviteService;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    //
    public function index()
    {
        // dd(Auth::id());
        $colocations = Colocation::with(['users' => function($query) {
            $query->withPivot(['status', 'type']); // Include pivot fields
        }])->whereHas('users', function($query) {
            $query->where('users.id', Auth::id()); // Fix: 'users.id' not 'user.id'
        })->get();
        $coloc_active=null;
        if (User::find(Auth::id())->activeColocation()->exists()) {
            # code...
            $coloc_active=User::find(Auth::id())->activeColocation()->first()->id;
        }

        
        return view('colocations.index',['colocations' => $colocations,'idcololc' => $coloc_active]);
    }

    public function create()
    {
        return view('colocations.create');
    }

    public function store(StoreColocationRequest $request,InviteService $inviteService)
    {
        $image=$request->file('image')->store('images', 'public');
        $valid=$request->validated();
        $valid['image'] = $image;
        if (Membership::where('user_id', Auth::id())->where('status', 'active')->exists()) {
            # code...
            Membership::where('user_id', Auth::id())
            ->where('status', 'active')
            ->first()->update(['status' => 'non active']);
        }
        // User::find(1)->activeColocation->first()->update(['status' => 'non active']);
        $colocation=Colocation::create($valid);
        $token=uniqid();
        Membership::create([
            'type' => 'owner',
            'joined_at' => now(),
            'token' => $token,
            'status' => 'active',
            'colocation_id' => $colocation->id,
            'user_id' => Auth::id()
            ]);
        if ($request->filled('invite_email')) { 
            $inviteService->sendInvites($request->input('invite_email'),$colocation->id,$token); 
        }
        return to_route('colocations.index');
    }

    public function show($id)
    {
        // dd(Colocation::findOrFail($id)->users);
        return  view('colocations.show',['colocation' => Colocation::with('users.depenses')->findOrFail($id),'idcololc' =>User::find(Auth::id())->activeColocation()->first()->id]);
    }

    public function update(Request $request, $id)
    {
        $Colocation = Colocation::findOrFail($id);
        $Colocation->update($request->all());
        return $Colocation;
    }

    public function destroy($id)
    {
        Colocation::find($id)->users()->detach();
        Colocation::destroy($id);
        return to_route('colocations.index');
    }

    public function enroll() 
    {
        return view('spaces.confirm-join');
    }

    public function enrolllogique(Request $request) 
    {
        $house=Colocation::find($request->house_id);
        $house->users()->attach(Auth::id());
    }

    public function kick($id) 
    {
        $house = User::find(Auth::id())->activeColocation->first();
        $user = User::find($id);
        $debt = 0;
        // dd($user->settlements);
        if($user->settlements()->where('user_id',$id)->where('status','pending')->exists()){
            $user->reputation -= 1; 
            foreach($user->settlements()->where('user_id',$id)->where('status','pending')->get() as $amount){
                $debt += $amount->amount;
            }
            $user->save(); // Save reputation change
        } 
        
        // Calculate share based on remaining users (excluding the one being kicked)
        $remainingUsers = $house->users->where('id', '!=', $id);
        $remainingCount = $remainingUsers->count();
        
        if ($remainingCount > 0 && $debt > 0) {
            $share = $debt / $remainingCount;
            
            // Deduct only from remaining users
            foreach ($remainingUsers as $remainingUser) {
                $remainingUser->solde -= $share;
                $remainingUser->save();
            }
        }
        
        // Detach the user
        $house->users()->detach($id);
        
        return to_route('colocations.index');
    }



    public function quitter()
    {
        $currentUser = Auth::user();
        
        // Get current user's active colocation
        $house = $currentUser->activeColocation()->first();
       
        
        $debt = 0;
        $reputationDeduction = 0;
        
        // Get all pending settlements for this user in this colocation
        $pendingSettlements = settlement::where('user_id', $currentUser->id)
            ->where('status', 'pending')
            ->get();
        
        if ($pendingSettlements->isNotEmpty()) {
            $reputationDeduction = $pendingSettlements->count();
            
            foreach($pendingSettlements as $settlement) {
                $debt += $settlement->amount;
                $settlement->status = 'paid';
                $settlement->save();
            }
        }
        
        // Distribute debt among remaining housemates if any
        if ($debt > 0) {
            $remainingUsers = $house->users->where('id', '!=', $currentUser->id);
            $remainingCount = $remainingUsers->count();
            
            if ($remainingCount > 0) {
                $share = $debt / $remainingCount;
                
                foreach ($remainingUsers as $user) {
                    $user->solde -= $share;
                    $user->save();
                }
            }
        }
        
        // Apply reputation penalty
        if ($reputationDeduction > 0) {
            $currentUser->reputation -= 1;
            $currentUser->save();
        }
        
        // Update pivot before detaching
        $house->users()->updateExistingPivot($currentUser->id, [
            'left_at' => now(),
            'status' => 'non active'
        ]);
        
        // Detach user
        // $house->users()->detach($currentUser->id);
        
        return to_route('colocations.index');
    }
}
