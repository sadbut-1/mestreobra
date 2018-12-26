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
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@user.com',
            'role' => \App\Models\User::ADMIN,
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@user.com',
            'role' => \App\Models\User::USER,
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

//        DB::table('oauth_clients')->insert([
//            'id' => '123456',
//            'secret' => '654321',
//        ]);
    }
}