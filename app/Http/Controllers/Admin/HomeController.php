<?php

namespace App\Http\Controllers\Admin;

use App\Committee;
use App\Enrollment;
use App\Portfolio;
use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
        $committees = Committee::get();
        $protfolios = Portfolio::get();
        $enrollment = Enrollment::where('user_id',auth()->user()->id)->count();
        return view('admin.home',['committees' => $committees,'protfolios' => $protfolios,'enrollment_count' => $enrollment]);
    }

    public function submitForm(Request $request)
    {
        $authUser = auth()->user();
        $dataSave = [
            [
                'user_id' => $authUser->id,
                'committee_id' => $request->firstCommittee,
                'portfolio_id' => $request->firstPortfolio,
                'status' => 'awaiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $authUser->id,
                'committee_id' => $request->secondCommittee,
                'portfolio_id' => $request->secondPortfolio,
                'status' => 'awaiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $authUser->id,
                'committee_id' => $request->thirdCommittee,
                'portfolio_id' => $request->thirdPortfolio,
                'status' => 'awaiting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Enrollment::insert($dataSave);
        return response()->json(['status' => '200','message' => 'Form Submitted Successfully','data' => $request->all()],200);
    }
}
