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
        $users = array(
            [
                'name' => 'Thiện Phạm',
                'email' => 'chithien175@gmail.com',
                'password' => bcrypt('123123'),
                'role' => 'superadmin'
            ],
            [
                'name' => 'Test 1',
                'email' => 'test1@gmail.com',
                'password' => bcrypt('123123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Test 2',
                'email' => 'test2@gmail.com',
                'password' => bcrypt('123123'),
                'role' => 'user'
            ]
        );
        
        DB::table('users')->insert($users);
    }
}
