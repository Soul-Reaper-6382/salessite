<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanKey extends Model
{
    use HasFactory;

    protected $fillable = ['plan_id', 'key_name','given','video_url'];

    // Relationship with the Plan model
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
