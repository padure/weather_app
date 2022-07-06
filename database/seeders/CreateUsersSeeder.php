<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
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
                'name'=>'Admin User',
                'email'=>'admin@test.com',
                'type'=>1,
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'User',
                'email'=>'user@test.com',
                'type'=>0,
                'password'=> bcrypt('12345678'),
            ],
        ];
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
