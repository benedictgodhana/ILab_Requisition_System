<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemReceipt extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'item_id',
        'quantity',
        'cost_per_item',
        'total_cost',
        'user_id', // The user who added the receipt
    ];

    // Relationship with Item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
