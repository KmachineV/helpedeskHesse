@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.employee.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.employee.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.employee.fields.first_name') }}*</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($employees) ? $employees->first_name : '') }}" required>
                @if($errors->has('first_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projects.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="content">{{ trans('cruds.employee.fields.last_name') }}</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($employees) ? $employees->last_name : '') }}" required>
                @if($errors->has('last_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.employee.fields.content_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('rut') ? 'has-error' : '' }}">
                <label for="content">{{ trans('cruds.employee.fields.rut') }}</label>
                <input type="text" id="rut" name="rut" class="form-control" value="{{ old('rut', isset($employees) ? $employees->rut : '') }}" required>
                @if($errors->has('rut'))
                    <em class="invalid-feedback">
                        {{ $errors->first('rut') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.employee.fields.content_helper') }}
                </p>
            </div>


            <input id="status" name="status" type="hidden" value="1">

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
<script>
    $('.colorpicker').colorpicker();
</script>
@endsection
