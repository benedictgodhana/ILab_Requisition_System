<?php
namespace App\Mail;

use App\Models\OrderHeader;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequisitionUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $requisition;

    public function __construct(OrderHeader $requisition)
    {
        $this->requisition = $requisition;
    }

    public function build()
    {
        return $this->subject('Your Requisition has been Updated')
                    ->view('emails.requisition_updated') // You can customize the view file
                    ->with([
                        'requisition' => $this->requisition,
                    ]);
    }
}
