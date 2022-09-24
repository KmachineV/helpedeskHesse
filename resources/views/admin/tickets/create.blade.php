@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.ticket.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tickets.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.ticket.fields.title') }}*</label>
                <input  type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($ticket) ? $ticket->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                <label for="content">{{ trans('cruds.ticket.fields.content') }}</label>
                <textarea id="content" name="content" class="form-control ">{{ old('content', isset($ticket) ? $ticket->content : '') }}</textarea>
                @if($errors->has('content'))
                    <em class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.content_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('attachments') ? 'has-error' : '' }}">
                <label for="attachments">{{ trans('cruds.ticket.fields.attachments') }}</label>
                <div class="needsclick dropzone" id="attachments-dropzone">
                    <input type="file" class="form-control-file" name="attachments[]" id="attachments[]" multiple accept="image/*">
                </div>
                @if($errors->has('attachments'))
                    <em class="invalid-feedback">
                        {{ $errors->first('attachments') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.attachments_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                <label for="category">{{ trans('cruds.ticket.fields.category') }}*</label>
                <select name="category_id" id="category" class="form-control select2" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ (isset($ticket) && $ticket->category ? $ticket->category->id : old('category_id')) == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('category_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('author_name') ? 'has-error' : '' }}">

                <input type="hidden" id="author_name" name="author_name" class="form-control" value="{{$user->first_name .' '. $user->last_name}}">
                @if($errors->has('author_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('author_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.author_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('author_email') ? 'has-error' : '' }}">
                <input type="hidden" id="author_email" name="author_email" class="form-control" value="{{$user->email}}">
                @if($errors->has('author_email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('author_email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.author_email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{$user->id}}">
                @if($errors->has('user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('user_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.ticket.fields.author_name_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection


