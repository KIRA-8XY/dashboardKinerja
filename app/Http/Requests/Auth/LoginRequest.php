<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginRequest extends FormRequest
{
    /**
     * Menentukan apakah user boleh membuat request ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi untuk form login.
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Mencoba untuk mengotentikasi credentials dari request login.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $username = $this->input('username');
        $password = $this->input('password');
        $remember = $this->boolean('remember');
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

        if (!$user || !Auth::attempt(['email' => $user->email, 'password' => $password], $remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'username' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Pastikan request login belum diblokir karena terlalu banyak percobaan.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Kunci throttle berdasarkan email dan IP.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('username')).'|'.$this->ip());
    }
}
