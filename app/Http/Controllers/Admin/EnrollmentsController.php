<?php

namespace App\Http\Controllers\Admin;

use App\Committee;
use App\Portfolio;
use App\Enrollment;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEnrollmentRequest;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Http\Requests\UpdateEnrollmentRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnrollmentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('enrollment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrollments = Enrollment::with(['committee','portfolio'])->where('status','accepted')->get();

        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function create()
    {
        abort_if(Gate::denies('enrollment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $committees = Committee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $portfolios = Portfolio::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.enrollments.create', compact('users', 'committees', 'portfolios'));
    }

    public function store(StoreEnrollmentRequest $request)
    {
        $enrollment = Enrollment::create($request->all());

        return redirect()->route('admin.enrollments.index');
    }

    public function edit(Enrollment $enrollment)
    {
        abort_if(Gate::denies('enrollment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $committees = Committee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $portfolios = Portfolio::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $enrollment->load('user', 'committee', 'portfolio');

        return view('admin.enrollments.edit', compact('users', 'committees', 'portfolios', 'enrollment'));
    }

    public function update(UpdateEnrollmentRequest $request, Enrollment $enrollment)
    {
        $enrollment->update($request->all());

        return redirect()->route('admin.enrollments.index');
    }

    public function show(Enrollment $enrollment)
    {
        abort_if(Gate::denies('enrollment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrollment->load('user', 'committee', 'portfolio');

        return view('admin.enrollments.show', compact('enrollment'));
    }

    public function destroy(Enrollment $enrollment)
    {
        abort_if(Gate::denies('enrollment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $enrollment->delete();

        return back();
    }

    public function massDestroy(MassDestroyEnrollmentRequest $request)
    {
        Enrollment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
