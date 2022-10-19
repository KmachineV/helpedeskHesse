@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       <b>Ticket de ayuda ID {{ $ticket->id }} - Usuario : {{ $ticket->users->first_name ?? '' }}  {{ $ticket->users->last_name ?? '' }} - RUT: {{ $ticket->users->rut ?? '' }}  </b>
    </div>

    <div class="card-body">
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.id') }}
                        </th>
                        <td>
                            {{ $ticket->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.title_singular') }}
                        </th>
                        <td>
                           <b> {{ $users->code ?? '' }} - {{ $users->name?? '' }}</b>
                        </td>
                    </tr>
                    <tr>
                    <th>
                        {{ trans('cruds.households.fields.address') }}
                    </th>
                    <td>
                        <b>{{ $houseHold->address ?? 'Sin direccion registrada.' }}</b>
                    </td>
                    </tr>
                    <tr>
                        <th>
                            Ubicacion
                        </th>
                        <td>
                            <b>Region {{$users->region ?? '(No registrada)'}}, Provincia {{$users->province?? '(No registrada)'}}, Comuna {{$users->commune?? '(No registrada)'}}</b>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.title') }}
                        </th>
                        <td>
                            {{ $ticket->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.content') }}
                        </th>
                        <td>
                            {!! $ticket->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($images as $img)
                                <img src="{{$img->url}}"class="card-img-top" target="_blank" style="max-width: 500px">
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.status') }}
                        </th>
                        <td>
                            {{ $ticket->status->name ?? 'Sin estado asignado.' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.priority') }}
                        </th>
                        <td>
                            {{ $ticket->priority->name ?? 'Sin prioridad asignada' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.category') }}
                        </th>
                        <td>
                            {{ $ticket->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.author_name') }}
                        </th>
                        <td>
                            {{ $ticket->author_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.author_email') }}
                        </th>
                        <td>
                            {{ $ticket->author_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.assigned_to_user') }}
                        </th>
                        <td>
                            {{ $ticket->employee->first_name ?? 'Sin trabajador asignado.' }}  {{ $ticket->employee->last_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.ticket.fields.comments') }}
                        </th>
                        <td>
                            @forelse ($comments as $comment)
                                <div class="row">
                                    <div class="col">
                                        <p class="font-weight-bold">{{ $comment->author_email}} ({{ date('d-m-y', strtotime($comment->created_at)) }})</p>
                                        <p>{{ $comment->comment_text }}</p>
                                    </div>
                                </div>
                                <hr />
                            @empty
                                <div class="row">
                                    <div class="col">
                                        <p>Sin comentarios.</p>
                                    </div>
                                </div>
                                <hr />
                            @endforelse
                            <form action="{{ route('admin.tickets.storeComment', $ticket->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="comment_text">Deja un comentario.</label>
                                    <textarea class="form-control" id="comment_text" name="comment_text" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('global.submit')</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a class="btn btn-default my-2" href="{{ route('admin.tickets.index') }}">
            {{ trans('global.back_to_list') }}
        </a>

            @can('user_management_access')
                <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-primary">
                    Gestionar Ticket
                </a>

                <a href="{{ route('admin.tickets.pdf', $ticket->id)}}"  class="btn btn-warning">
                    <i class="fas fa-archive nav-icon">
                        Imprimir
                    </i>
                </a>
            @endcan


        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
    </div>
</div>
@endsection
