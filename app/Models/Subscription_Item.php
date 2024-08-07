<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription_Item extends Model
{
    use HasFactory;
    protected $table = 'subscription_items';
    protected $fillable = ['subscription_id','stripe_id','stripe_product','stripe_price','quantity','created_at','updated_at'];
}
