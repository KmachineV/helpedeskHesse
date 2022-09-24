@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.employee.title_singular') }}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.households.update", [$households->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.households.fields.address') }}*</label>
                    <textarea type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($households) ? $households->address : '') }}" required> {{$households->address }}  </textarea>
                    @if($errors->has('address'))
                        <em class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.households.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('information') ? 'has-error' : '' }}">
                    <label for="content">{{ trans('cruds.households.fields.information') }}</label>
                    <textarea type="text" id="information" name="information" class="form-control" value="{{ old('information', isset($households) ? $households->information : '') }}" required>{{$households->information}} </textarea>
                    @if($errors->has('information'))
                        <em class="invalid-feedback">
                            {{ $errors->first('information') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.households.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                    <label for="status">{{ trans('cruds.households.fields.user_id') }}*</label>
                    <select name="user_id" id="user_id" class="form-control select2" required>
                        @foreach($users as $id => $user)
                            <option value="{{ $user->id }}">{{$user->first_name. ' ' . $user->last_name. ' '. $user->rut }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('user_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('user_id') }}
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

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
@endsection
