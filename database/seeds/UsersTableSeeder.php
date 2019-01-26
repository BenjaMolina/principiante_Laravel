<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->trunctate();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'email@mail.com',
            'password' => bcrypt("123"),
        ]);

        $role = Role::create([
            'name' => "admin",
            'display_name' => "Administrador",
            "description" => "Administrador de sitio web"
        ]);

        $user->roles()->save($role);
    }
}
