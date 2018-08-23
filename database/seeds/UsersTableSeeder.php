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
            'name' => 'Thiện Phạm',
            'email' => 'chithien175@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'administrator'
        ]);
    }
}
