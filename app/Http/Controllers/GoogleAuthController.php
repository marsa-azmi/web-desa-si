<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;

class GoogleAuthController extends Controller
{
    // Mengarahkan pengguna ke halaman login Google.
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    // Menerima callback dari Google setelah login.
    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        return response()->json([
            'id' => $googleUser->getId(),
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'avatar' => $googleUser->getAvatar(),
        ]);
    }
}