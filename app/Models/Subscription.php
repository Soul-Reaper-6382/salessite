<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','stripe_id','stripe_status','stripe_price','quantity','ends_at','created_at','updated_at'];

    protected $casts = [
        'ends_at' => 'datetime',
    ];
}
