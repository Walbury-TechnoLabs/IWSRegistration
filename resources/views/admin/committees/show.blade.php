@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.committee.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.id') }}
                        </th>
                        <td>
                            {{ $committee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.name') }}
                        </th>
                        <td>
                            {{ $committee->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.description') }}
                        </th>
                        <td>
                            {!! $committee->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.committee.fields.photo') }}
                        </th>
                        <td>
                            @if($committee->photo)
                                <a href="{{ $committee->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $committee->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <!-- <tr>
                        <th>
                            {{ trans('cruds.committee.fields.institution') }}
                        </th>
                        <td>
                            {{ $committee->institution->name ?? '' }}
                        </td>
                    </tr> -->
                   <!--  <tr>
                        <th>
                            {{ trans('cruds.committee.fields.price') }}
                        </th>
                        <td>
                            ${{ $committee->price }}
                        </td>
                    </tr> -->
                    <tr>
                        <th>
                            Disciplines
                        </th>
                        <td>
                            @foreach($committee->disciplines as $id => $disciplines)
                                <span class="label label-info label-many">{{ $disciplines->name }}</span>
                            @endforeach
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