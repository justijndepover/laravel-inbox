<?php

namespace Justijndepover\Inbox\Middleware;

use Illuminate\Support\Facades\Gate;

class Authorize
{
    public function handle($request, $next)
    {
        if (! Gate::check('viewInbox')) {
            abort(403);
        }

        return $next($request);
    }
}