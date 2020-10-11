<?php

namespace Justijndepover\InterceptEmails\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['date', 'from', 'to', 'cc', 'bcc', 'subject', 'body'];
}