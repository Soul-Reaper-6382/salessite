<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Text2 extends Model
{
    use HasFactory;
    protected $table = 'hometext2';
    protected $fillable = ['heading_one','text'];
}
