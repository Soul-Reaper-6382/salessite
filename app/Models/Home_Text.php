<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Text extends Model
{
    use HasFactory;
    protected $table = 'hometext';
    protected $fillable = ['heading_one','heading_two','text'];
}
