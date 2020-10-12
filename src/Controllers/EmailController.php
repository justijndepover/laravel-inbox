<?php

namespace Justijndepover\Inbox\Controllers;

use Illuminate\Routing\Controller;
use Justijndepover\Inbox\Models\Email;

class EmailController extends Controller
{
    public function index($id = null)
    {
        $emails = Email::orderBy('created_at', 'desc')->get();
        $email = Email::find($id);

        if (!$email) {
            $email = $emails->first();
        }

        return view('laravel-inbox::index', [
            'emails' => $emails,
            'email' => $email,
        ]);
    }
}