<?php

namespace App\Http\Controllers;

use App\Committee;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::searchResults()
            ->paginate(6);

        $breadcrumb = "Committees";

        return view('committees.index', compact(['committees', 'breadcrumb']));
    }

    public function show(Committee $committee)
    {
        $committee->load('portfolio');
        $breadcrumb = $committee->name;

        return view('committees.show', compact(['committee', 'breadcrumb']));
    }
}
