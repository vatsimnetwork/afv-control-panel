<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Vatsim\OAuth\SSO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * This controller handles authenticating users for the application and
 * redirecting them to your home screen. The controller uses a trait
 * to conveniently provide its functionality to your applications.
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $sso;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->sso = new SSO(
            config('vatsim-sso.base'),
            config('vatsim-sso.key'),
            config('vatsim-sso.secret'),
            config('vatsim-sso.method'),
            config('vatsim-sso.cert')
        );
    }

    public function login(Request $request)
    {
        return $this->sso->login(route('auth.login.verify'), function ($key, $secret, $url) use ($request) {
            $request->session()->put('vatsimauth', compact('key', 'secret'));

            return redirect($url);
        }, function ($error) {
            Log::error('SSO Login Error - '.$error->getMessage());

            return redirect()->route('home')->withError(['Login failed', $error->getMessage()]);
        });
    }

    public function verifyLogin(Request $request)
    {
        $session = $request->session()->get('vatsimauth');
        $main = route('home');

        return $this->sso->validate(
            $session['key'],
            $session['secret'],
            $request->oauth_verifier,
            function ($user) use ($request, $main) {
                $request->session()->forget('vatsimauth');
                $this->completeLogin($user);

                return redirect()->intended($main);
            },
            function ($error) use ($request) {
                Log::error('SSO Validation Error - '.$error->getMessage());

                return redirect()->route('home')->withError(['Login failed', $error->getMessage()]);
            }
        );
    }

    public function completeLogin($user)
    {
        $account = User::firstOrNew(['id' => $user->id]);

        $account->first_name = utf8_decode($user->name_first);
        $account->last_name = utf8_decode($user->name_last);
        $account->last_login = Carbon::now();
        $account->save();

        return auth()->login($account, true);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home')->withSuccess(['Logout', 'You have been successfully logged out']);
    }
}
