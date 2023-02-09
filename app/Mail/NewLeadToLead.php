<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLeadToLead extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    public function __construct($_data)
    {
        $this->data = $_data;
    }

    public function build()
    {
        return $this
        ->subject('Benvenuto a Boolpress' . $this->data['name'])
                ->view('view.newLeadToAdmin', [
                    'data' => $this->data,
                ]);
    }
}
