<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'a',
                'email' => 'a@a',
                'password' => '111222333',
            ],
            [
                'name' => 'lol',
                'email' => 'lol@lol',
                'password' => Hash::make('lol'),
            ],
            [
                'name' => 'ciao',
                'email' => 'ciao@ciao',
                'password' => Hash::make('ciao'),
            ],
            [
                'name' => 'sium',
                'email' => 'sium@sium',
                'password' => Hash::make('sium'),
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
