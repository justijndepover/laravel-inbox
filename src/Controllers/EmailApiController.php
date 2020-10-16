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

    public function show(Email $email)
    {
        return response()->json($email);
    }
}