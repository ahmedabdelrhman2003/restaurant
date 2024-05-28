<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Role;



use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);

        // $permissions = Permission::get();
        // dd($permissions)
        $user = User::where('id', Session::get('loginId'))->first();
        return view('auth.roles.index', compact('user', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        // dd($permissions)
        $user = User::where('id', Session::get('loginId'))->first();
        return view('auth.roles.create', compact('user', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'permissionId' => ['required', 'array']
        ]);
        $role = new Role;

        $role->name = $request->name;
        $role->save();
        $role->permissions()->attach($request->permissionId);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::where('id', $id)->with('permissions')->first();
        $user = User::where('id', Session::get('loginId'))->first();
        return view('auth.roles.view', compact('user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::where('id', $id)->with('permissions')->first();

        $permissions = Permission::get();
        $user = User::where('id', Session::get('loginId'))->first();
        return view('auth.roles.edit', compact('permissions', 'user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // dd($id);
        $request->validate([
            'name' => ['required', 'max:255'],
            'permissionId' => ['required', 'array']
        ]);
        $role = Role::find($id);
        $role->name = $request->name;

        $role->permissions()->attach($request->permissionId);
        $role->save();
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->roles()->detach();
        $role->delete();
        return redirect()->route('role.index');
    }
}
