<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return back()->with('status', 'Invalid login or password');
        }

        return redirect()->route('home');
    }
    public function github(){

        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect(){
        $user = Socialite::driver('github')->user(); 
        // dd($user);

        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name?$user->name:$user->nickname , 
            'username' =>$user->nickname,
            'email' => $user->email,
            'password' => Hash::make(Str::random(24))
        ]);
            
        Auth::login($user , true) ; 

        return redirect()->route('home');
    }
}
