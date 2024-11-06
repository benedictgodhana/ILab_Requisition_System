<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'unique_code',
        'reorder_level',
        'manufacturer_code',
        'user_id', // The user who added the item
    ];

    // Relationship with ItemReceipt
    public function receipts()
    {
        return $this->hasMany(ItemReceipt::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function quantities()
{
    return $this->hasMany(ItemQuantity::class);
}



}
