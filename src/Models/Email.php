<?php

namespace Justijndepover\InterceptEmails\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['from_email', 'from_name', 'to_email', 'to_name', 'cc', 'bcc', 'subject', 'body'];
}