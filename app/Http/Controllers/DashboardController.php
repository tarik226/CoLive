<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Colocation;
use App\Models\depense;
use App\Models\settlement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Category::count();
        // dd(depense::all()->groupBy('category_id'))->map(function($item){
        //     return $item/Category::count();
        // });
        return view('admin.dashboard',
            [
                'users' => User::with('activeColocation')->get(),
                'depenses_cost' => Depense::whereNotNull('amount')->count(),
                'colocation_count' => Colocation::count(),
                'categorie_count' => Category::count(),
                ''
            ]);
    }

    public function inedxx()
    {
        return view('dashboard',[
            'depense_total' => User::find(Auth::id())->depenses->sum('amount'),
            'dettes' => User::find(Auth::id())->settlements->where('status','pending')->sum('aùount'),
            'tedoit' => settlement::where('user_id', 1)->where('status', 'pending')->sum('amount')
        ]);
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return back();
    }
}
