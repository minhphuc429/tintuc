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
        $role_admin = \App\Models\Role::where('name', 'administrator')->first();
        $role_editor = \App\Models\Role::where('name', 'editor')->first();

        $admin = new \App\Models\User();
        $admin->name = 'Manager Name';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $admin = new \App\Models\User();
        $admin->name = 'Editor Name';
        $admin->email = 'editor@example.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_editor);

        factory(App\Models\User::class, 10)->create();
    }
}
