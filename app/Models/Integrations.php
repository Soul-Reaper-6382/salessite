<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrations extends Model
{
    use HasFactory;
    
    protected $table = 'integrations';
    protected $fillable = ['image', 'heading', 'text', 'cat_id'];

    // An integration belongs to a category
    public function category()
    {
        return $this->belongsTo(Integrations_Cat::class, 'cat_id');
    }
}
