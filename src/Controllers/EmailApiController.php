<?php

namespace Justijndepover\Inbox\Controllers;

use Justijndepover\Inbox\Models\Email;

class EmailApiController
{
    public function index()
    {
        $emails = Email::orderBy('created_at', 'desc')
            ->get()
            ->map(function ($email) {
                return [
                    'id' => $email->id,
                    'from_name' => $email->from_name,
                    'subject' => $email->subject,
                    'created_at' => $email->created_at->format('d/m/Y'),
                ];
            });

        return response()->json($emails);
    }

    public function show($id)
    {
        $email = Email::findOrFail($id);

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

    public function template($id)
    {
        $email = Email::findOrFail($id);

        return $email->body;
    }
}