<?php

namespace App\Http\Controllers;

use App\Models\depense;
use App\Models\settlement;
use App\Models\User;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;

class SettlementController extends Controller
{
    //
    public function regler($id)
    {
        $settlement = Settlement::find($id);
        
        if (!$settlement) {
            return back()->with('error', 'Settlement not found');
        }
        
        // Get the expense to find who should receive the money
        $expense = depense::find($settlement->depense_id);
        
        if (!$expense) {
            return back()->with('error', 'Expense not found');
        }
        
        // User who owes money (the one paying)
        $payer = User::find($settlement->user_id);
        
        // User who should receive money (from depenses.user_id)
        $receiver = User::find($expense->user_id);
        
        if (!$payer || !$receiver) {
            return back()->with('error', 'User not found');
        }
        
        // Subtract from payer
        $payer->solde -= $settlement->amount;
        $payer->save();
        
        // Add to receiver
        $receiver->solde += $settlement->amount;
        $receiver->save();
        
        // Update settlement
        $settlement->status = 'paid';
        $settlement->paid_at = now();
        $settlement->save();
        
        return to_route('depenses.index')->with('success', 'Payment completed');
    }
}
