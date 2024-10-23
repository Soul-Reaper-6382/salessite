<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Images extends Model
{
    use HasFactory;
    protected $table = 'homeimages';
    protected $fillable = ['image','text','reorder'];
}
