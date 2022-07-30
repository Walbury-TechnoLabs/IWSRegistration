@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.enrollment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.enrollments.update", [$enrollment->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(auth()->user()->isPortfolio())
                <input type="hidden" name="user_id" value="{{ (isset($enrollment) && $enrollment->user) ? $enrollment->user->id : '' }}">
            @else
                <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                    <label for="user">{{ trans('cruds.enrollment.fields.user') }}*</label>
                    <select name="user_id" id="user" class="form-control select2" required>
                        @foreach($users as $id => $user)
                            <option value="{{ $id }}" {{ (isset($enrollment) && $enrollment->user ? $enrollment->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('user_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('user_id') }}
                        </em>
                    @endif
                </div>
            @endif
            <div class="form-group {{ $errors->has('committee_id') ? 'has-error' : '' }}">
                <label for="committee">{{ trans('cruds.enrollment.fields.committee') }}*</label>
                <select name="committee_id" id="committee" class="form-control select2" required>
                    @foreach($committees as $id => $committee)
                        <option value="{{ $id }}" {{ (isset($enrollment) && $enrollment->committee ? $enrollment->committee->id : old('committee_id')) == $id ? 'selected' : '' }}>{{ $committee }}</option>
                    @endforeach
                </select>
                @if($errors->has('committee_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('committee_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('portfolio_id') ? 'has-error' : '' }}">
                <label for="portfolio">{{ trans('cruds.enrollment.fields.portfolio') }}*</label>
                <select name="portfolio_id" id="portfolio" class="form-control select2" required>
                    @foreach($portfolios as $id => $portfolio)
                        <option value="{{ $id }}" {{ (isset($enrollment) && $enrollment->portfolio ? $enrollment->portfolio->id : old('portfolio_id')) == $id ? 'selected' : '' }}>{{ $portfolio }}</option>
                    @endforeach
                </select>
                @if($errors->has('portfolio_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('portfolio_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.enrollment.fields.status') }}*</label>
                @foreach(App\Enrollment::STATUS_RADIO as $key => $label)
                    <div>
                        <input id="status_{{ $key }}" name="status" type="radio" value="{{ $key }}" {{ old('status', $enrollment->status) === (string)$key ? 'checked' : '' }} required>
                        <label for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <em class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection