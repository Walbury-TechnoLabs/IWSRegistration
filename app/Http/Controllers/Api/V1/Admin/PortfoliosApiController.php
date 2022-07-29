<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Http\Resources\Admin\PortfolioResource;
use App\Portfolio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PortfoliosApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('portfolio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PortfolioResource(Portfolio::all());
    }

    public function store(StorePortfolioRequest $request)
    {
        $portfolio = Portfolio::create($request->all());

        if ($request->input('logo', false)) {
            $portfolio->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        return (new PortfolioResource($portfolio))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Portfolio $portfolio)
    {
        abort_if(Gate::denies('portfolio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PortfolioResource($portfolio);
    }

    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $portfolio->update($request->all());

        if ($request->input('logo', false)) {
            if (!$portfolio->logo || $request->input('logo') !== $portfolio->logo->file_name) {
                $portfolio->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($portfolio->logo) {
            $portfolio->logo->delete();
        }

        return (new PortfolioResource($portfolio))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Portfolio $portfolio)
    {
        abort_if(Gate::denies('portfolio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $portfolio->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
