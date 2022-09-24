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
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
                'remember_token' => null,
                'projectid'      => null,
                'rut'            => '27114377K'

            ],
            [
                'id'             => 2,
                'first_name'     => 'ITO',
                'last_name'      => 'Ito',
                'email'          => 'ito@ito.com',
                'password'       => '$2y$10$UnLIBQB1uZZC1r5msFWTPuZCZsMBUpZINpJ48G5FmMxz6yVGP83rO',
                'remember_token' => null,
                'projectid'      => null,
                'rut'            => '269177993'
            ],


        ];

        User::insert($users);
    }
}
