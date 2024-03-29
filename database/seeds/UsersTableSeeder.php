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
        User::create([
            'name'    => 'JohnSmith',
            'email'    => 'johnsmith@gmail.com',
            'password'   =>  Hash::make('password'),
        ]);
    }
}
