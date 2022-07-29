<?php

namespace App\Http\Controllers\Admin;

use App\Committee;
use App\Discipline;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCommitteeRequest;
use App\Http\Requests\StoreCommitteeRequest;
use App\Http\Requests\UpdateCommitteeRequest;
use App\Portfolio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommitteesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('committee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committees = Committee::all();

        return view('admin.committees.index', compact('committees'));
    }

    public function create()
    {
        abort_if(Gate::denies('committee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $portfolios = Portfolio::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplines = Discipline::all()->pluck('name', 'id');

        // return view('admin.committees.create', compact('disciplines'));

        return view('admin.committees.create', compact('portfolios', 'disciplines'));

    }

    public function store(StoreCommitteeRequest $request)
    {
        $committee = Committee::create($request->all());
        $committee->disciplines()->sync($request->input('disciplines', []));

        if ($request->input('photo', false)) {
            $committee->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return redirect()->route('admin.committees.index');
    }

    public function edit(Committee $committee)
    {
        abort_if(Gate::denies('committee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $portfolios = Portfolio::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $disciplines = Discipline::all()->pluck('name', 'id');

        $committee->load('portfolio', 'disciplines');

        return view('admin.committees.edit', compact('portfolios', 'disciplines', 'committee'));
    }

    public function update(UpdateCommitteeRequest $request, Committee $committee)
    {
        $committee->update($request->all());
        $committee->disciplines()->sync($request->input('disciplines', []));

        if ($request->input('photo', false)) {
            if (!$committee->photo || $request->input('photo') !== $committee->photo->file_name) {
                $committee->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($committee->photo) {
            $committee->photo->delete();
        }

        return redirect()->route('admin.committees.index');
    }

    public function show(Committee $committee)
    {
        abort_if(Gate::denies('committee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committee->load('portfolio', 'disciplines');

        return view('admin.committees.show', compact('committee'));
    }

    public function destroy(Committee $committee)
    {
        abort_if(Gate::denies('committee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committee->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommitteeRequest $request)
    {
        Committee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
