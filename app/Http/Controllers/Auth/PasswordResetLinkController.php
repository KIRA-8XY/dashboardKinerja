<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string'],
        ]);

        $username = $request->input('username');
        $lowerUsername = strtolower($username);
        $user = null;

        if ($lowerUsername === 'admin') {
            $user = User::where('email', 'admin@example.com')->first();
        } elseif ($lowerUsername === 'developeradmin') {
            $user = User::where('email', 'devadmin@example.com')->first();
        } elseif ($lowerUsername === 'developerpegawai') {
            $user = User::where('pegawai_id', 99)->first();
        } else {
            $user = User::whereHas('pegawai', function ($query) use ($lowerUsername) {
                $query->whereRaw("LOWER(REPLACE(nama, ' ', '')) = ?", [$lowerUsername]);
            })->first();
        }

        if (!$user) {
            throw ValidationException::withMessages([
                'username' => __('We can\'t find a user with that username.'),
            ]);
        }

        // We will send the password reset link to this user.
        $status = Password::sendResetLink(
            ['email' => $user->email]
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('username'))
                ->withErrors(['username' => __($status)]);
    }
}
