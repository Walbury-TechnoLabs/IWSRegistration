<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Committee;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCommitteeRequest;
use App\Http\Requests\UpdateCommitteeRequest;
use App\Http\Resources\Admin\CommitteeResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommitteesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('committee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommitteeResource(Committee::with(['portfolio', 'disciplines'])->get());
    }

    public function store(StoreCommitteeRequest $request)
    {
        $committee = Committee::create($request->all());
        $committee->disciplines()->sync($request->input('disciplines', []));

        if ($request->input('photo', false)) {
            $committee->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new CommitteeResource($committee))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Committee $committee)
    {
        abort_if(Gate::denies('committee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CommitteeResource($committee->load(['portfolio', 'disciplines']));
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

        return (new CommitteeResource($committee))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Committee $committee)
    {
        abort_if(Gate::denies('committee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $committee->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
