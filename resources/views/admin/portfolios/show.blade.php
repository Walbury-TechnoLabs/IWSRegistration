@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.portfolio.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.portfolio.fields.id') }}
                        </th>
                        <td>
                            {{ $portfolio->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.portfolio.fields.name') }}
                        </th>
                        <td>
                            {{ $portfolio->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.portfolio.fields.description') }}
                        </th>
                        <td>
                            {!! $portfolio->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.portfolio.fields.logo') }}
                        </th>
                        <td>
                            @if($portfolio->logo)
                                <a href="{{ $portfolio->logo->getUrl() }}" target="_blank">
                                    <img src="{{ $portfolio->logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection