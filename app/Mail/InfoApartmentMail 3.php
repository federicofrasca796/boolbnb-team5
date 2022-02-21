<?php

namespace App\Mail;

use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InfoApartmentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        //pass data messages to markdown file
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('noreply@admin.com')
            ->subject('New message info apartment')
            ->markdown('mail.messages.apartment_messages')
            ->with([
                'url' => route('ura.messages.index'),
            ]);
    }
}
