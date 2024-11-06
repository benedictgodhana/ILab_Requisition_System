<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHeader extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',       // The ID of the user who created the order
        'status_id',     // The ID of the status for the order
        'order_number',
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the Item model
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    // Define the relationship to the Status model
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id'); // Adjust 'requisition_id' if needed
    }
}
