<?php
namespace App\Mail;

use App\Models\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ItemQuantityAssignedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $item;
    public $assignedQuantity;
    public $remainingQuantity;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Item  $item
     * @param  int  $assignedQuantity
     * @param  int  $remainingQuantity
     * @return void
     */
    public function __construct(Item $item, $assignedQuantity, $remainingQuantity)
    {
        $this->item = $item;
        $this->assignedQuantity = $assignedQuantity;
        $this->remainingQuantity = $remainingQuantity;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.item_assigned')
                    ->with([
                        'itemName' => $this->item->name,
                        'assignedQuantity' => $this->assignedQuantity,
                        'remainingQuantity' => $this->remainingQuantity,
                    ]);
    }
}
