<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = App\Role::where('name', 'User')->first();
        $role_admin = App\Role::where('name', 'Admin')->first();

        $user = new App\User();
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new App\User();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
