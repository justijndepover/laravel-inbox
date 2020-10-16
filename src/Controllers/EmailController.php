<?php

namespace Justijndepover\Inbox\Controllers;

class EmailController
{
    public function __invoke()
    {
        return view('laravel-inbox::index');
    }
}