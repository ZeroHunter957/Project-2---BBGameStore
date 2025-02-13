<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $user = User::where('email', $request->email)->first();

            if ($user && $user->password == $request->password) {
                Auth::login($user);
                $request->session()->put('user_id', $user->id);
                $request->session()->put('role', $user->role);

                Log::info('User logged in successfully', ['user_id' => $user->id, 'role' => $user->role]);

                if ($user->role == 1) {
                    return redirect()->intended('/dashboard');
                } else {
                    return redirect()->intended('/shop');
                }
            } else {
                Log::warning('Login failed', ['email' => $request->email]);

                return redirect()->back()->with('error', 'Invalid credentials');
            }
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage(), ['exception' => $e]);

            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
