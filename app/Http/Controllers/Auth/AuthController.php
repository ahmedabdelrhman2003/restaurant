<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    //
    function login()
    {
        if (!Session::has('loginId')) {
            return view('auth.login');
        } else
            return redirect()->route('dashboard');
    }
    function login_user(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->Session()->put('loginId', $user->id);
                $id = $user->id;
                Auth::login(User::find($id));
                return redirect()->route('dashboard');
            } else {
                return back()->with('failed', 'wrong password');
            }
        } else {
            return back()->with('failed', 'email is not valid');
        }
    }
    function admins()
    {

        $user = User::where('id', Session::get('loginId'))->first();
        $users = User::with('role')->get();
        $role = $user->role;
        return view('auth.admins', compact('user', 'role', 'users'));
    }
    function create()
    {

        $user = User::where('id', Session::get('loginId'))->first();
        $roles = Role::get();
        return view('auth.create', compact('user', 'roles'));
    }

    function edit($id)
    {
        $user = User::where('id', Session::get('loginId'))->first();
        $admin = User::find($id);
        $roles = Role::get();
        return view('auth.edit', compact('user', 'admin', 'roles'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'role' => ['required', 'exists:roles,id']
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->save();
        return redirect()->route('auth.admins');
    }

    function register(RegisterRequest $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;

        $user->password = Hash::make($request->password);
        $user->save();



        if ($user) {
            return redirect()->route('auth.admins')->with('success', 'user created');
        } else {
            return back()->with('failed', 'failed to create user');
        }
    }
    function logout()
    {


        Session::pull('loginId');
        Auth::logout();
        return redirect()->route('auth.login');
    }
    function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        return back();
    }
}
