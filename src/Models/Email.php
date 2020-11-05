<?php

namespace Justijndepover\Inbox\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = ['from_email', 'from_name', 'to_email', 'to_name', 'cc', 'bcc', 'subject', 'body'];

    public function getCcAttribute($cc)
    {
        return json_decode($cc);
    }

    public function getBccAttribute($bcc)
    {
        return json_decode($bcc);
    }

    public function getTags()
    {
        return implode(' ', [
            $this->from_email,
            $this->from_name,
            $this->to_email,
            $this->to_name,
            $this->cc,
            $this->bcc,
            $this->subject,
        ]);
    }
}