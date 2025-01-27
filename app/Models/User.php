<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected static function boot()
    {
        parent::boot();

        // static::creating(function ($user) {
        //     $user->source_object_id = Str::random(18);
        // });
        static::creating(function ($user) {
        do {
            // Generate a random 12-digit number
            $randomNumber = str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT);
        } while (self::where('source_object_id', $randomNumber)->exists()); // Ensure uniqueness

        $user->source_object_id = $randomNumber;
        });
    }
    
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'username',
        'phone',
        'status',
        'stripe_id',
        'plan_id',
        'password_apo',
        'source_object_id',
        'lead_id',
    ];

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
        'trial_ends_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::Class);
    }

     public function userDetail()
    {
        return $this->hasOne(UserDetail::class);
    }
}
