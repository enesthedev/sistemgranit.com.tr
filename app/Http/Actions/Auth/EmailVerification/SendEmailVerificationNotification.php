<?php

namespace App\Http\Actions\Auth\EmailVerification;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class SendEmailVerificationNotification extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'throttle:6,1',
        ];
    }

    public function __invoke(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard.index', absolute: false));
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}

