<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $guid;
    protected $name;

    public function __construct($guid, $name)
    {
        $this->guid = $guid;
        $this->name = $name;
    }

    public function build()
    {
        return $this->view('emails.verifymail', ['guid' => $this->guid, 'name' => $this->name]);
    }
}
