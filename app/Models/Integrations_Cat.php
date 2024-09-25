<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrations_Cat extends Model
{
    use HasFactory;
    
    protected $table = 'integrations_cat';
    protected $fillable = ['name'];

    // A category has many integrations
    public function integrations()
    {
        return $this->hasMany(Integrations::class, 'cat_id');
    }
}
