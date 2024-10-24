<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calc_Text extends Model
{
    use HasFactory;
    protected $table = 'calc_text';
    protected $fillable = ['heading_one','heading_two','text_one','text_two','text_three','text_four','text_five','text_six','text_seven','text_eight','text_none'];
}
