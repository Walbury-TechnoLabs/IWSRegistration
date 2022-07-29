<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPortfolioRequest;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Portfolio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PortfoliosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('portfolio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $portfolios = Portfolio::all();

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        abort_if(Gate::denies('portfolio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.portfolios.create');
    }

    public function store(StorePortfolioRequest $request)
    {
        $portfolio = Portfolio::create($request->all());

        if ($request->input('logo', false)) {
            $portfolio->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        return redirect()->route('admin.portfolios.index');
    }

    public function edit(Portfolio $portfolio)
    {
        abort_if(Gate::denies('portfolio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.portfolios.edit', compact('portfolio'));
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

        return redirect()->route('admin.portfolios.index');
    }

    public function show(Portfolio $portfolio)
    {
        abort_if(Gate::denies('portfolio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function destroy(Portfolio $portfolio)
    {
        abort_if(Gate::denies('portfolio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $portfolio->delete();

        return back();
    }

    public function massDestroy(MassDestroyPortfolioRequest $request)
    {
        Portfolio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
