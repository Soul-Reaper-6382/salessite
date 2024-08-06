<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Videos extends Model
{
    use HasFactory;
    protected $table = 'homevideos';
    protected $fillable = ['video_one','video_two'];
}
