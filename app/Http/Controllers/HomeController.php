<?php

namespace App\Http\Controllers;

use App\Committee;
use App\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        $newestCommittees = Committee::orderBy('id', 'desc')->take(3)->get();
        $randomPortfolios = Portfolio::inRandomOrder()->take(3)->get();

        return view('home', compact(['newestCommittees', 'randomPortfolios']));
    }
}
