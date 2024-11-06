<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'name', // The name of the status (e.g., 'pending', 'approved', 'declined')
    ];

    // Define the relationship to the OrderHeader model
    public function orderHeaders()
    {
        return $this->hasMany(OrderHeader::class);
    }
}
