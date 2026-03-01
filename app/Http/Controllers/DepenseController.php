<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepenseRequest;
use App\Models\Category;
use App\Models\Colocation;
use App\Models\depense;
use App\Models\settlement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepenseController extends Controller
{
    //
    public function index()
    {
        // List all dependences
        $colocation_id=User::find(Auth::id())->colocation()->where('memberships.status','active')->value('colocations.id');
        $user=Auth::id();
        // Colocation::find($colocation_id)->users()->get()
        $depenses = User::find($user)->colocation->flatMap->depenses;
        $settlements = Settlement::where('user_id', Auth::id())->where('status','pending')->with('depense.user')->get(); 
        $a_rembourser = $settlements->map(function ($settlement) { 
            $colocation_id=User::find(Auth::id())->colocation()->where('memberships.status','active')->value('colocations.id');
            $depense = $settlement->depense; 
            $part=$depense->amount/Colocation::find($colocation_id)->users()->get()->count();
            return [ 
                'user_id' => $depense->user->id, 
                'user_name' => $depense->user->name, 
                'amount_depense' => $part,
                'id_settlement' => $settlement->id 
            ];
        });
        $categories=Category::all();
        // dd($a_rembourser);
        return view('expenses.index',compact('categories' ,'colocation_id' ,'user' ,'depenses','a_rembourser'));
    }

    public function store(StoreDepenseRequest $request)
    {
         // Create a new depense
        $depense = depense::create($request->validated());
        // dd($depense->id,$depense->user,$depense->amount);
        settlement::create([
            'depense_id' => $depense->id,
            'user_id' => $depense->user->id,
            'amount' => $depense->amount,
        ]);
        return to_route('depenses.index');
    }

    public function show($id)
    {
        // Show a single depense
        return depense::with(['colocation', 'category'])->findOrFail($id);
    }
}
