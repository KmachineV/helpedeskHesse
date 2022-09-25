@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <input type="hidden" id="name" name="name" class="form-control" value="default" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                <label for="first_name">{{ trans('cruds.user.fields.first_name') }}*</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', isset($user) ? $user->first_name : '') }}" required>
                @if($errors->has('first_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('first_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                <label for="last_name">{{ trans('cruds.user.fields.last_name') }}*</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', isset($user) ? $user->last_name : '') }}" required>
                @if($errors->has('last_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('last_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('rut') ? 'has-error' : '' }}">
                <label for="rut">{{ trans('cruds.user.fields.rut') }}*</label>
                <input type="text" id="rut" name="rut" class="form-control" value="{{ old('rut', isset($user) ? $user->rut : '') }}" required>
                @if($errors->has('rut'))
                    <em class="invalid-feedback">
                        {{ $errors->first('rut') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>


            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('projectid') ? 'has-error' : '' }}">
                <label for="status">{{ trans('cruds.user.fields.project_id') }}*</label>
                <select name="projectid" id="projectid" class="form-control select2">
                    @foreach($projects as $id => $project)
                        <option value="{{ $project->id }}" }}>{{$project->name}} - {{$project->code }}  - {{$project->status == 1 ? 'Activo' : 'Finalizado' }}</option>
                    @endforeach
                </select>
                @if($errors->has('projectid'))
                    <em class="invalid-feedback">
                        {{ $errors->first('projectid') }}
                    </em>
                @endif
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
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
