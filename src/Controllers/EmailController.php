<?php

namespace Justijndepover\InterceptEmails\Controllers;

use Illuminate\Routing\Controller;
use Justijndepover\InterceptEmails\Models\Email;

class EmailController extends Controller
{
    public function index($id = null)
    {
        $emails = Email::orderBy('created_at', 'desc')->get();
        $email = Email::find($id);

        if (!$email) {
            $email = $emails->first();
        }

        return view('mail-interceptor::index', [
            'emails' => $emails,
            'email' => $email,
        ]);
    }
}