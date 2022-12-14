@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.committee.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.committees.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.committee.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($committee) ? $committee->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.committee.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.committee.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($committee) ? $committee->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.committee.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label for="photo">{{ trans('cruds.committee.fields.photo') }}</label>
                <div class="needsclick dropzone" id="photo-dropzone">

                </div>
                @if($errors->has('photo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.committee.fields.photo_helper') }}
                </p>
            </div>
          <!--   @if(auth()->user()->isPortfolio())
                <input type="hidden" name="portfolio_id" value="{{ auth()->user()->portfolio_id }}">
            @else
                <div class="form-group {{ $errors->has('portfolio_id') ? 'has-error' : '' }}">
                    <label for="portfolio">{{ trans('cruds.committee.fields.portfolio') }}*</label>
                    <select name="portfolio_id" id="portfolio" class="form-control select2" required>
                        @foreach($portfolios as $id => $portfolio)
                            <option value="{{ $id }}" {{ (isset($committee) && $committee->portfolio ? $committee->portfolio->id : old('portfolio_id')) == $id ? 'selected' : '' }}>{{ $portfolio }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('portfolio_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('portfolio_id') }}
                        </em>
                    @endif
                </div>
            @endif -->
           <!--  <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('cruds.committee.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($committee) ? $committee->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.committee.fields.price_helper') }}
                </p>
            </div> -->
            <div class="form-group {{ $errors->has('disciplines') ? 'has-error' : '' }}">
                <label for="disciplines">{{ trans('cruds.committee.fields.disciplines') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="disciplines[]" id="disciplines" class="form-control select2" multiple="multiple">
                    @foreach($disciplines as $id => $disciplines)
                        <option value="{{ $id }}" {{ (in_array($id, old('disciplines', [])) || isset($committee) && $committee->disciplines->contains($id)) ? 'selected' : '' }}>{{ $disciplines }}</option>
                    @endforeach
                </select>
                @if($errors->has('disciplines'))
                    <em class="invalid-feedback">
                        {{ $errors->first('disciplines') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.committee.fields.disciplines_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.committees.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($committee) && $committee->photo)
      var file = {!! json_encode($committee->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $committee->photo->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@stop