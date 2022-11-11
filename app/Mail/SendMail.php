<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $pesan, $status)
    {
        $this->status = $status;
        $this->data = $data;
        $this->pesan = $pesan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $status = $this->status;
        $data = $this->data;
        $pesan = $this->pesan;
        if ($status === 'lambat') {
            return $this->subject('manajemenproyek@bisadong.id')
                ->view('email.lambat', compact('data', 'pesan'));
        } else {
            return $this->subject('manajemenproyek@bisadong.id')
                ->view('email.index', compact('data', 'pesan'));
        }
    }
}
