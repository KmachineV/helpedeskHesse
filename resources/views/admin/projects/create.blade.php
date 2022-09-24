@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.projects.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.projects.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.projects.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($projects) ? $projects->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projects.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content">{{ trans('cruds.projects.fields.code') }}</label>
                <input id="code" name="code" class="form-control ">{{ old('code', isset($projects) ? $projects->code : '') }}</input>
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projects.fields.content_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('startProejct') ? 'has-error' : '' }}">
                <label for="content">{{ trans('cruds.projects.fields.start_project') }}</label>
                <input type="date" id="startProject" name="startProject" class="form-control ">{{ old('code', isset($projects) ? $projects->startProject : '') }}</input>
                @if($errors->has('startProject'))
                    <em class="invalid-feedback">
                        {{ $errors->first('startProject') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projects.fields.content_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('endProejct') ? 'has-error' : '' }}">
                <label for="content">{{ trans('cruds.projects.fields.end_project') }}</label>
                <input type="date" id="endProject" name="endProject" class="form-control ">{{ old('code', isset($projects) ? $projects->endProject : '') }}</input>
                @if($errors->has('startProject'))
                    <em class="invalid-feedback">
                        {{ $errors->first('endProejct') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projects.fields.content_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('endWarranty') ? 'has-error' : '' }}">
                <label for="content">{{ trans('cruds.projects.fields.end_warranty') }}</label>
                <input type="date" id="endWarranty" name="endWarranty" class="form-control ">{{ old('code', isset($projects) ? $projects->endWarranty : '') }}</input>
                @if($errors->has('endWarranty'))
                    <em class="invalid-feedback">
                        {{ $errors->first('endProejct') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.projects.fields.content_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('region_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.projects.fields.Region') }}*</label>
                <select name="region_id" id="region" class="form-control select2" required>
                    @foreach($regions as $id => $region)
                        <option value="{{ $id }}" {{ (isset($projects) && $projects->region ? $projects->region->id : old('region_id')) == $id ? 'selected' : '' }}>{{$region}}</option>
                    @endforeach
                </select>
                @if($errors->has('region_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('region_id') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('province_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.projects.fields.Province') }}*</label>
                <select name="province_id" id="province" class="form-control select2" required>
                    @foreach($provinces as $id => $province)
                        <option value="{{ $id }}" {{ (isset($projects) && $projects->province ? $projects->province->id : old('province_id')) == $id ? 'selected' : '' }}>{{$province}}</option>
                    @endforeach
                </select>
                @if($errors->has('province_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('province_id') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('commune_id') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.projects.fields.commune') }}*</label>
                <select name="commune_id" id="commune" class="form-control select2" required>
                    @foreach($communes as $id => $commune)
                        <option value="{{ $id }}" {{ (isset($projects) && $projects->commune ? $projects->commune->id : old('commune_id')) == $id ? 'selected' : '' }}>{{$commune}}</option>
                    @endforeach
                </select>
                @if($errors->has('commune_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('commune_id') }}
                    </em>
                @endif
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
