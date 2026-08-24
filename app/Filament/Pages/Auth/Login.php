<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    /**
     * Override method ini untuk memisahkan error email dan password
     * Referensi: https://laraveldaily.com/post/filament-3-login-with-name-username-or-email
     */

    protected function throwFailureValidationException(): never
    {
        $data = $this->form->getState();
        $credentials = $this->getCredentialsFromFormData($data);
        
        // Cek apakah email terdaftar
        $user = Auth::getProvider()->retrieveByCredentials([
            'email' => $credentials['email'],
        ]);

        if (! $user) {
            throw ValidationException::withMessages([
                'data.email' => 'Email yang Anda masukkan tidak terdaftar.',
            ]);
        }

        // Jika email ada tapi password salah
        throw ValidationException::withMessages([
            'data.password' => 'Password yang Anda masukkan salah.',
        ]);
    }
}