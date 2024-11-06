<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Specify the table name if it's not following Laravel's convention
    protected $table = 'order_item';

    // Fillable attributes for mass assignment
    protected $fillable = [
        'order_id', // Foreign key to the orders table
        'item_id',  // Foreign key to the items table
        'quantity',  // Quantity of the item
        'cost'  ,     // Cost of the item
        'remarks', // Add the remarks field here

    ];

    // Define the relationship with the Item model
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Define the relationship with the OrderHeader model
    public function order()
    {
        return $this->belongsTo(OrderHeader::class);
    }
}
