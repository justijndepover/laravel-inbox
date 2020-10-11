<?php

namespace Justijndepover\InterceptEmails\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Justijndepover\InterceptEmails\Models\Email;

class EmailLogger
{
    public function handle(MessageSending $event)
    {
        Email::create([
            'from_email' => collect($event->message->getFrom())->keys()->first(),
            'from_name' => collect($event->message->getFrom())->values()->first(),
            'to_email' => collect($event->message->getTo())->keys()->first(),
            'to_name' => collect($event->message->getTo())->values()->first(),
            'cc' => json_encode($event->message->getCc()),
            'bcc' => json_encode($event->message->getBcc()),
            'subject' => $event->message->getSubject(),
            'body' => $event->message->getBody(),
        ]);
    }
}
