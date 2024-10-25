<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Add user_id to fillable
        'item_name',
        'quantity',
        'cost_per_item',
        'total_value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
