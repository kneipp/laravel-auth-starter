<?php

use Kneipp\LaravelAuthStarter\Role;
use Kneipp\LaravelAuthStarter\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaravelAuthStarterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('roles')->delete();

        $admin = new User();
        $admin->name = 'Bruce Wayne';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('123123');
        $admin->save();

        $user = new User();
        $user->name = 'Peter Parker';
        $user->email = 'user@user.com';
        $user->password = bcrypt('123123');
        $user->save();

        $roles['admin'] = new Role();
        $roles['admin']->name         = 'admin';
        $roles['admin']->display_name = 'Administrador';
        // $roles['admin']->description  = 'Administrador do sistema';
        $roles['admin']->save();

        $roles['user'] = new Role();
        $roles['user']->name         = 'user';
        $roles['user']->display_name = 'Usuário';
        // $roles['user']->description  = 'Usuário padrão do sistema';
        $roles['user']->save();

        $admin->roles()->attach($roles['admin']->id);
        $user->roles()->attach($roles['user']->id);
    }
}
