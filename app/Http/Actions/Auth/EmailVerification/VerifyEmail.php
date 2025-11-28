<?php

namespace App\Http\Actions\Auth\EmailVerification;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;

class VerifyEmail extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'signed',
            'throttle:6,1',
        ];
    }

    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard.index', absolute: false).'?verified=1');
        }

        $request->fulfill();

        return redirect()->intended(route('dashboard.index', absolute: false).'?verified=1');
    }
}

