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
                'first_name'     => 'ADMINISTRADOR',
                'last_name'      => 'Admin',
                'email'          => 'kmachine.devv@gmail.com',
                'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
                'remember_token' => null,
                'projectid'      => null,
                'rut'            => '11111111-1'

            ],
            [
                'id'             => 2,
                'first_name'     => 'ITO',
                'last_name'      => 'Ito',
                'email'          => 'camachoj248@gmail.com',
                'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
                'remember_token' => null,
                'projectid'      => null,
                'rut'            => '27114377-k'
            ],


        ];

        User::insert($users);
    }
}
