<?php

use App\Portfolio;
use App\User;
use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1,3) as $id)
        {
            $portfolio = Portfolio::create(['name' => $faker->unique()->company, 'description' => $faker->paragraph]);
            $portfolio->addMedia(public_path("img/portfolios/portfolio_$id.png"))->preservingOriginal()->toMediaCollection('logo');
        }
        // User::find(2)->update(['portfolio_id' => 1]);
    }
}
