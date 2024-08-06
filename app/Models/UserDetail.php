<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'user_detail';

    protected $fillable = [
        'user_id',
        'lic_no',
        'store_name',
        'entity_name',
        'store_address',
        'store_city',
        'store_county',
        'store_state',
        'plan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
