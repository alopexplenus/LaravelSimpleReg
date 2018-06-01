<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{

    /**
     * verify account when user follows link from email
     *
     * @param  string  $verification_code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify($verification_code)
    {
                $user = User::whereVerification_code($verification_code)->first();
                if(!$user){
                        throw new Exception("Verification Code not Found");
                }

                if($user->verification_state == 1){
                    // Do not verify more than once
                    return redirect('/');
                }
                $user->verification_state = 1;
                $user->save();

                Auth::guard()->login($user);

                return redirect('/');
    }
}
