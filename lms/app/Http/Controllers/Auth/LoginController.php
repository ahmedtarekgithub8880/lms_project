<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    protected function authenticated()
    {
        if ( auth()->user() ) {

            return redirect()->back();
        }

        return redirect('/home');
    }


    public function redirectToProvider($provider){
        return  Socialite::driver($provider)->stateless()->redirect();

    }
    public function handleProviderCallback($provider){
        $social_user = Socialite::driver($provider)->stateless()->user();

        $user = User::where('provider_id', $social_user->getId())->first();

        if(!$user) {
            $user = User::create([
                'email' => $social_user->getEmail(),
                'name' => $social_user->getNickname(),
                'provider' => $social_user->getName(),
                'avatar' => $social_user->getAvatar(),
                'provider_id' => $social_user->getId(),
                'email_verified_at'=> now(),
            ]);

        }
        auth()->login($user ,true);
        return redirect('/');

    }

}
