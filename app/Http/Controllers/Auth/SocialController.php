<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Social;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function init($driver) {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(Social $social, $driver) {
        $user = Socialite::driver($driver)->user();
        $social->userInit($user, $driver);

        return redirect()->route('news');
    }
}
