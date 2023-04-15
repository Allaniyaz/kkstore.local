<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        // return
    }

    public function register(Request $request)
    {
        $request->validate($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);


    }

    public function signin(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if ( User::where('email', $request->email)->where('password', Hash::make($request->password))->exists() ) {
            $request->user()->login();
            return redirect()->route('shop.home')->with('success', 'You successfully authorized.');
        }
        return redirect()->route('shop.home')->withErrors('Incorrect login or password. Please try again.');
    }

    public function logout(Request $request)
    {
        $request->logout();
        return redirect()->route('shop.home')->with('success', 'You successfully logged out.');
    }
}
