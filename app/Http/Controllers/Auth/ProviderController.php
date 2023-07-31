<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleToProvider($provider)
    {
        $user = Socialite::driver($provider)->user();

        $check = Developer::where('email',$user->getEmail())->first();

        if(!$check) {

            $dev = Developer::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'role' => 'Junior Dev',
                'mobile' => 9677573377,
                'provider' => $provider,
                'location' => 'CBE',
                'provider_id' => $user->getId(),
                'provider_token' => $user->token,
            ]);

            \Auth::guard('dev')->login($dev);
        }
        else{
            \Auth::guard('dev')->login($check);
        }


        return redirect()->route('developer.timesheet');
    }
}
