<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'contact'           => '9824578978',
                'email'          => 'admin@admin.com',
                'class'           => '10',
                'school'           => 'ehis',
                'city'           => 'indore',
                'password'       => '$2y$10$xrsPLYaYoSrvak108tqKouwl9I/3VZMJ5h/I96pOCqwg.c0Dl4ILy',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Student',
                'contact'           => '9824578978',
                'email'          => 'student@student.com',
                'class'           => '10',
                'school'           => 'ehis',
                'city'           => 'indore',
                'password'       => '$2y$10$xrsPLYaYoSrvak108tqKouwl9I/3VZMJ5h/I96pOCqwg.c0Dl4ILy',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
