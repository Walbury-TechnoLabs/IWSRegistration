<?php

namespace App\Http\Controllers;

use App\Committee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnrollmentController extends Controller
{
    public function create(Committee $committee)
    {
        $breadcrumb = "Enroll in $committee->name committee";

        return view('enrollment.enroll', compact('committee', 'breadcrumb'));
    }

    public function store(Request $request, Committee $committee)
    {
        if(auth()->guest())
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);

            auth()->login($user);
        }
        
        $committee->enrollments()->create(['user_id' => auth()->user()->id]);

        return redirect()->route('enroll.myCommittees');
    }

    public function handleLogin(Committee $committee)
    {
        return redirect()->route('enroll.create', $committee->id);
    }

    public function myCommittees()
    {
        $breadcrumb = "My Committees";

        $userEnrollments = auth()->user()
            ->enrollments()
            ->with('committee.portfolio')
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('enrollment.committees', compact(['breadcrumb', 'userEnrollments']));
    }
}
