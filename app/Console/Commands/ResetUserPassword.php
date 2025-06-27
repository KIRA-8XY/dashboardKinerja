<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:reset-password {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resets a user\\s password to the default';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $username = $this->argument('username');
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
            $this->error("User with username '{$username}' not found.");
            return 1;
        }

        $defaultPassword = 'password';
        if ($user->pegawai_id == 99 || $user->email == 'devadmin@example.com') {
            $defaultPassword = 'passwordku';
        }

        $user->password = Hash::make($defaultPassword);
        $user->save();

        $this->info("Password for user '{$username}' has been reset to '{$defaultPassword}'.");
        return 0;
    }
}
