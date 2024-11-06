<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Requisition extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',       // The user who made the requisition
        'approved_by',   // The admin who approved it
        'declined_by',   // The admin who declined it
        'status',        // Status (approved, pending, or declined)
        'description',   // Optional description or note
    ];

    protected $dates = ['deleted_at']; // Enable soft delete tracking

    /**
     * Relationship to the user who made the requisition.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to the user who approved the requisition.
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Relationship to the user who declined the requisition.
     */
    public function declinedBy()
    {
        return $this->belongsTo(User::class, 'declined_by');
    }

    /**
     * Relationship to the items in the requisition.
     */
    public function items()
    {
        return $this->belongsToMany(ItemReceipt::class, 'item_requisition')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
