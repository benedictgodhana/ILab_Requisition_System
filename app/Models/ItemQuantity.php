<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemQuantity extends Model
{
    use HasFactory;

    protected $table = 'item_quantity'; // Specify the table name if needed

    // Fillable attributes for mass assignment
    protected $fillable = [
        'item_id', // Foreign key to the items table
        'quantity', // Quantity of the item
    ];

    // Relationship with Item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }


}
