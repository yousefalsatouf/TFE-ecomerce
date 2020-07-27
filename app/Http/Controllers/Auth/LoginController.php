<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use http\Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = '/';

    protected function home()
    {
        return view('front.home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try
        {
            $user = Socialite::driver('google')->user();
            $findUser = User::where('google_id', $user->id)->first();

            if($findUser)
            {
                Auth::login($findUser);
                return redirect('/');
            }else
            {
                $date = date("Y-m-d H:i:s");
                //dd($date);
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'email_verified_at' => $date,
                    'google_id'=> $user->id
                ]);
                //dd($newUser);

                Auth::login($newUser);

                return redirect('/');
            }

        } catch (Exception $e)
        {
            return redirect('auth/google');
        }
    }
}
