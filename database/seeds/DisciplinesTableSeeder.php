<?php

use App\Discipline;
use Illuminate\Database\Seeder;

class DisciplinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $disciplines = [
            [
                    'name' => 'IWS Delegation',
                    'description' => $faker->paragraph,
                    'price' => 1800
            ],
            [
                    'name' => 'Campus Ambassador',
                    'description' => $faker->paragraph,
                    'price' => 500
            ],
        ];
        foreach($disciplines as $id=>$disciplines)
        {
            $id++;
            $discipline = Discipline::create($disciplines);
            
        }
    }
}
