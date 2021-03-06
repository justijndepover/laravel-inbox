<?php

namespace Justijndepover\Inbox\Controllers;

use Justijndepover\Inbox\Models\Email;

class EmailApiController
{
    public function index()
    {
        $emails = Email::orderBy('created_at', 'desc')->paginate(50);
        $emails->getCollection()->transform(function ($email) {
            return [
                'id' => $email->id,
                'to_name' => $email->to_name,
                'subject' => $email->subject,
                'created_at' => $email->created_at->format('d/m/Y'),
                'read' => $email->read,
                'tags' => $email->getTags(),
            ];
        });

        return response()->json($emails);
    }

    public function show(Email $email)
    {
        $email->markRead();

        return response()->json([
            'id' => $email->id,
            'from_email' => $email->from_email,
            'from_name' => $email->from_name,
            'to_email' => $email->to_email,
            'to_name' => $email->to_name,
            'cc' => $email->cc,
            'bcc' => $email->bcc,
            'subject' => $email->subject,
            'created_at' => $email->created_at->format('d/m/Y H:i'),
        ]);
    }

    public function destroy(Email $email)
    {
        $email->delete();

        return response(null, 204);
    }

    public function template(Email $email)
    {
        return $email->body;
    }
}
