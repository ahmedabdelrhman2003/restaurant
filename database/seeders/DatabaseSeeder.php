<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $createPermissions = ['admin', 'product', 'card', 'feedback', 'delivery', 'kitchen', 'about'];
        foreach ($createPermissions as $index => $permission) {
            $new = new Permission();
            $new->name = $permission;
            $new->save();
        }

        $role = new Role();
        $role->name = 'admin';


        $permissions = Permission::pluck('id')->all();
        $role->save();
        $role->permissions()->attach($permissions);

        $roleId = $role->id;

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->role_id = $roleId;
        $user->password = Hash::make('12345678');
        $user->save();
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}