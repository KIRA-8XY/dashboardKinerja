<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
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
                'username' => __('Username not found.'),
            ]);
        }

        // Check if the user is still on a default password
        $isDefaultPassword = Hash::check('password', $user->password);
        $isDevPassword = Hash::check('passwordku', $user->password);

        if (!$isDefaultPassword && !$isDevPassword) {
            throw ValidationException::withMessages([
                'username' => __('You have already set your password. Please log in.'),
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('status', 'Password Anda telah berhasil diubah. Silakan masuk dengan password baru Anda.');
    }
}
