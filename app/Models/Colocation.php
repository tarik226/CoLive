<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    /** @use HasFactory<\Database\Factories\ColocationFactory> */
    use HasFactory;

    protected $fillable = ['name','place','image','status'];

    public function depenses() 
    { 
        return $this->hasMany(depense::class); 
    } 
    
    public function users() 
    { 
        return $this->belongsToMany(User::class,'memberships')->withPivot('type','left_at','joined_at','token','status'); ; 
    }

    protected $table = 'colocations';
}
