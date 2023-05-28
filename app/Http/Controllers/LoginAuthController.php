<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Role;

class LoginAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard_admin');
        } else if (Auth::guard('web')->check()) {
            return redirect()->route('userindex');
        } else if (Auth::guard('karyawan')->check()) {
            return redirect()->route('homekaryawan');
        } else {
            if(Cookie::get('email') !== null){
                $email=Cookie::get('email');
                $pass=Cookie::get('pass');
                //return $pass;
                return view('layouts.login',compact('email','pass'));
            }else{
                return view('layouts.login');
            }
        }
    }

    public function login(Request $request)
    {
        $minutes=1200;
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user=User::where('email',$request->email)->first();
        if(isset($user)){
            switch ($user->role_id) {
                case '1':
                    $guard="web";
                    break;
                case '2':
                    $guard="admin";
                    break;
                case '3':
                    $guard="karyawan";
                    break;
            }
            if(auth()->guard($guard)->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                $user = auth()->guard($guard)->user();
                if($request->rememberme=='on'){
                    $cookie1 = Cookie::make('email', $request->email, $minutes);
                    $cookie2 = Cookie::make('pass', $request->password, $minutes);
                    if ($guard=='admin') {
                        return redirect()->intended(url('/homekaryawan'))->withCookie($cookie1)->withCookie($cookie2);
                    }elseif ($guard=='web') {
                        return redirect()->intended(url('/landingpage'))->withCookie($cookie1)->withCookie($cookie2);
                    }elseif ($guard=='karyawan') {
                        return redirect()->intended(url('/homekaryawan'))->withCookie($cookie1)->withCookie($cookie2);
                    }
                    
                }else{
                    $cookie1 = Cookie::forget('email');
                    $cookie2 = Cookie::forget('pass');
                    if ($guard=='admin') {
                        return redirect()->intended(url('/homekaryawan'))->withCookie($cookie1)->withCookie($cookie2);
                    }elseif ($guard=='web') {
                        return redirect()->intended(url('/landingpage'))->withCookie($cookie1)->withCookie($cookie2);
                    }elseif ($guard=='karyawan') {
                        return redirect()->intended(url('/homekaryawan'))->withCookie($cookie1)->withCookie($cookie2);
                    }
                    
                }
            } else {
                return redirect()->back()->withError('Credentials doesn\'t match.');
            }
        }else{
            return redirect()->back()->withError('Credentials doesn\'t match.');
        }
        
        
        
    }

    public function logout(Request $request)
    {
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
        } elseif(Auth::guard('karyawan')->check()){
            Auth::guard('karyawan')->logout();
        }elseif(Auth::guard('web')->check()){
            Auth::guard('web')->logout();
        }
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginfinal');
    }

    //////////google/////////////

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('google_id', $user->id)->first();
            if(isset($finduser) AND $finduser->role_id==1){
                Auth::login($finduser);
                return redirect()->intended(url('/homepage'));
            }elseif (isset($finduser) AND $finduser->role_id==3) {
                Auth::guard('karyawan')->login($finduser);
                return redirect()->intended(url('/homekaryawan'));
            } else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'google_id'=> $user->id,
                        'role_id'=> '1',
                        'password' => Hash::make('123456dummy')
                    ]);
                Auth::login($newUser);
                return redirect()->intended(url('/homekaryawan'));
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function relog_reset(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginfinal');
    }
    public function privacypol()
    {
        return view('privacy_policies');
    }
}