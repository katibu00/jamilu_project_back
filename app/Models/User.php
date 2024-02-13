<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   
    protected $fillable = [
        'name',
        'username',
        'phone',
        'email',
        'referral_code',
        'password'
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Define the relationship with ReservedAccount model
    public function reservedAccounts()
    {
        return $this->hasOne(ReservedAccount::class);
    }

    // Define the relationship with Wallet model
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function courses()
    {
        return $this->belongsToMany(Course::class)
                    ->withPivot('progress') // Include the progress column from the pivot table
                    ->withTimestamps();
    }


    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
