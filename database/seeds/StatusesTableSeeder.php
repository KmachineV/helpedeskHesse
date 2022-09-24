<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $statuses = [
            'En evaluación', 'En revisión', 'En reparación', 'Cerrado'
        ];

        foreach($statuses as $status)
        {
            Status::create([
                'name'  => $status,
                'color' => $faker->hexcolor
            ]);
        }
    }
}
