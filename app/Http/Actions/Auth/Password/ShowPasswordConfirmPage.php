<?php

namespace App\Http\Actions\Auth\Password;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ShowPasswordConfirmPage extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('auth/confirm-password');
    }
}

