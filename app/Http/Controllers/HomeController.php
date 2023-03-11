<?php

namespace App\Http\Controllers;

use App\Committee;
use App\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        $newestCommittees = Committee::orderBy('id', 'asc')->get();
        return view('home', compact(['newestCommittees']));
    }
}
