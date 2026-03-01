<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'reputation',
        'is_banned'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function colocation() 
    { 
        return $this->belongsToMany(Colocation::class,'memberships')->withPivot('type','left_at','joined_at','token','status'); 
    }

    public function depenses()
    {
        return $this->hasMany(depense::class);
    }

    public function activeColocation() 
    { 
        return $this->belongsToMany(Colocation::class,'memberships')->where('colocations.status', 'active')->withPivot('type','left_at','joined_at','token','status'); 
    }

    public function settlements()
    {
        return $this->hasMany(settlement::class);
    }
}
