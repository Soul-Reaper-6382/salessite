<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graphic_Text extends Model
{
    use HasFactory;
    protected $table = 'graphic_text';
    protected $fillable = ['heading','text','text2'];
}
