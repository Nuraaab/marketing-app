<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $package;
    protected $order;

    public function __construct(Package $package, Order $order)
    {
        $this->package = $package;
        $this->order = $order;
    }

    public function build()
    {
        return $this->view('emails.purchase_confirmation')
            ->with([
                'email' => auth()->user()->email,
                'package_name' => $this->package->name,
                'package_price' => $this->package->unit . $this->package->price,
                'payment_date' => $this->order->payment_date,
                'transaction_id' => $this->order->txn_id,
            ]);
    }
}
