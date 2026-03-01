<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settlement extends Model
{
    /** @use HasFactory<\Database\Factories\SettlementFactory> */
    use HasFactory;

    protected $fillable = ['depense_id','user_id','amount','status','paid_at'];


    public function depense() 
    { 
        return $this->belongsTo(Depense::class); 
    } 
    
    public function user() 
    { 
        return $this->belongsTo(User::class, 'user_id'); 
    }

}
