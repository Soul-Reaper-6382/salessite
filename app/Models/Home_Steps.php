<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Steps extends Model
{
    use HasFactory;
    protected $table = 'homesteps';
    protected $fillable = ['file', 'heading', 'text', 'buttons'];

    protected $casts = [
        'buttons' => 'array',
    ];
}
