<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circle_Text extends Model
{
    use HasFactory;
    protected $table = 'ciircletext';
    protected $fillable = ['heading_one','text','cir1','cir2','cir3','cir4','cir5','cir6','cir7','cir8','cir9','cir10','text1','text2','text3','text4','text5','text6','text7','text8','text9','text10'];
}
