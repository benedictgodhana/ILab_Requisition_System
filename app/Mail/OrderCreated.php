<?php

namespace App\Mail;

use App\Models\OrderHeader;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @param OrderHeader $order
     * @return void
     */
    public function __construct(OrderHeader $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Requisition Created')
                    ->view('emails.order_created')
                    ->with([
                        'orderNumber' => $this->order->order_number,
                        'orderDate' => $this->order->created_at->format('Y-m-d H:i:s'),
                        'status' => $this->order->status->name,
                    ]);
    }
}
