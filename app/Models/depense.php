<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class depense extends Model
{
    /** @use HasFactory<\Database\Factories\DepenseFactory> */
    use HasFactory;


    protected $fillable = ['title','amount','category_id','colocation_id','user_id'];
    public function colocation() 
    { 
        return $this->belongsTo(Colocation::class); 
    } 
    
    public function category() 
    { 
        return $this->belongsTo(Category::class); 
    }

    public function user() 
    { 
        return $this->belongsTo(User::class); 
    }

    public function settlements()
    {
        return $this->hasMany(settlement::class);
    }
}
