<?php

namespace App\Http\Actions\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ShowForgotPasswordPage extends Controller
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('auth/forgot-password', [
            'status' => $request->session()->get('status'),
        ]);
    }
}

