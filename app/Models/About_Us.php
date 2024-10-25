<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_Us extends Model
{
    use HasFactory;
    protected $table = 'about_us';
    protected $fillable = ['heading_one','heading_two','heading_three','text_one','text_two','text_three','image_one','image_two'];
}
