<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'             => 'Jose Mejias',
            'email'             => 'jdani9417@gmail.com',
            'password'         => bcrypt('1234'),
            'role'  => 'admin',
            
        ]);
    }
}
