@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
                <label for="contact">{{ trans('cruds.user.fields.contact') }}*</label>
                <input type="text" id="contact" name="contact" class="form-control" value="{{ old('contact', isset($user) ? $user->contact : '') }}" required>
                @if($errors->has('contact'))
                    <em class="invalid-feedback">
                        {{ $errors->first('contact') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.contact_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                Kindly ensure that you submit the right email address
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
                <label for="class">{{ trans('cruds.user.fields.class') }}*</label>
                <input type="text" id="class" name="class" class="form-control" value="{{ old('class', isset($user) ? $user->class : '') }}" required>
                @if($errors->has('class'))
                    <em class="invalid-feedback">
                        {{ $errors->first('class') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.class_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('school') ? 'has-error' : '' }}">
                <label for="school">{{ trans('cruds.user.fields.school') }}*</label>
                <input type="text" id="school" name="school" class="form-control" value="{{ old('school', isset($user) ? $user->school : '') }}" required>
                @if($errors->has('school'))
                    <em class="invalid-feedback">
                        {{ $errors->first('school') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.school_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="city">{{ trans('cruds.user.fields.city') }}*</label>
                <input type="text" id="city" name="city" class="form-control" value="{{ old('city', isset($user) ? $user->city : '') }}" required>
                @if($errors->has('city'))
                    <em class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.city_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div>
            <!-- <div class="form-group {{ $errors->has('portfolio_id') ? 'has-error' : '' }}" id="portfolioGroup" style="{{ in_array(2, old('roles', [])) ? '' : 'display:none'}}">
                <label for="portfolio">{{ trans('cruds.user.fields.portfolio') }}</label>
                <select name="portfolio_id" id="portfolio" class="form-control select2">
                    @foreach($portfolios as $id => $portfolio)
                        <option value="{{ $id }}" {{ (isset($user) && $user->portfolio ? $user->portfolio->id : old('portfolio_id')) == $id ? 'selected' : '' }}>{{ $portfolio }}</option>
                    @endforeach
                </select>
                @if($errors->has('portfolio_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('portfolio_id') }}
                    </em>
                @endif
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

<!-- @section('scripts')
<script>
$(document).ready(function() {
    $('#roles').change(function() {
        if($("#roles option:selected:contains('Portfolio')").val())
            $("#portfolioGroup:hidden").show(150);
        else
            $("#portfolioGroup:visible").hide(150);
    });
});
</script>
@endsection -->