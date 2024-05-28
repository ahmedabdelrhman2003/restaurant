<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    //
    function index()
    {
        return view('auth.forgot_password');
    }
    function forgot_password(Request $request)
    {
        $request->validate(['email' => ['required', 'exists:users,email'],]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'email_verified_at' => Carbon::now()
        ]);
        Mail::send('auth.mail', compact('token'), function ($message) use ($request) {
            $message->to($request->email);
        });
        return redirect()->route('auth.forgot')->with('success', 'email was sent already');
    }
    function reset($token)
    {
        return view('auth.new_password', compact('token'));
    }
    function reset_password(Request $request)
    {
        $request->validate([
            'email' => ['required', 'exists:users'],
            'password' => ['required', 'min:8'],
        ]);
        $affected = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])->first();
        if (!$affected) {
            return redirect()->route('auth.reset')->with('failed', 'invalid email');
        }
        $updated =  User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where('email', $request->email)->delete();
        return redirect()->route('auth.login')->with('success', 'password reset successfully');
        if (!$updated) {
            return redirect()->route('auth.reset')->with('failed', 'error');
        }
    }
}