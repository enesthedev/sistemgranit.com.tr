<?php

namespace App\Http\Actions\Settings\Password;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ShowPasswordEditPage extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('settings/password');
    }
}

