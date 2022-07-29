<?php

use App\User;
use App\Committee;
use App\Portfolio;
use App\Enrollment;
use Illuminate\Database\Seeder;

class EnrollmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $committees = Committee::pluck('id');
        $portfolios = Portfolio::pluck('id');
        $user = User::first();
        $statuses = collect(['awaiting', 'accepted', 'rejected']);
        foreach($committees as $committee)
            $user->enrollments()->create([
                'committee_id' => $committee,
                'status' => $statuses->random()
            ]);
    }
}
