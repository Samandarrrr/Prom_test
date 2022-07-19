<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)

    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $data['password'] = Hash::make($request->password);
        $created_user = User::create($data);
        return redirect()->back();
    }
}
