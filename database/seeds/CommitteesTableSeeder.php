<?php

use App\Committee;
use App\Discipline;
use App\Portfolio;
use Illuminate\Database\Seeder;

class CommitteesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $committees = [
            [
                'name' => 'UNHRC',
                'description' => $faker->paragraph,
            ],
            [
                'name' => 'WHO',
                'description' => $faker->paragraph,
            ],
            [
                'name' => 'UNESCO',
                'description' => $faker->paragraph,
            ],
        ];

        foreach($committees as $id=>$committees)
        {
            $id++;
            $committee = Committee::create($committees);
            $committee->addMedia(public_path("img/committee/committee_$id.png"))->preservingOriginal()->toMediaCollection('photo');
           
        }
    }
}
