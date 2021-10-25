<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class RandEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $messageText;
    private $fromEmail;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageText,$fromEmail)
    {
        $this->messageText = $messageText;
        $this->fromEmail = $fromEmail;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $emails = ['@mail.ru','@list.ru','@rambler.ru','@yandex.ru','@gmail.com'];
        $email = $emails[rand(0, count($emails) - 1)];

        $names = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $name = substr(str_shuffle($names), 0, 5);

        $randEmail = $name.$email;
        return $this
            ->from($randEmail)
            ->view('mails.rand-email',[
                'messageText' => $this->messageText
            ]);
    }


}
