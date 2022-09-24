<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Ticket pdf</title>
</head>
<body>
<div class="card">

    <div class="card-header text-center">
       HESSE CONSTRUCTORA <br><b> Ticket de ayuda ID {{ $ticket->id }} - Usuario : {{ $ticket->users->first_name ?? '' }}  {{ $ticket->users->last_name ?? '' }} - RUT: {{ $ticket->users->rut ?? '' }}  </b>
    </div>

    <div class="card-body">

        <div class="mb-2">
            <b><p>Datos del ticket de ayuda.</p></b>
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
                        <b>{{ $houseHold->address ?? 'Sin direccion asiganada'}}</b>
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
                        {{ trans('cruds.ticket.fields.status') }}
                    </th>
                    <td>
                        {{ $ticket->status->name ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.ticket.fields.priority') }}
                    </th>
                    <td>
                        {{ $ticket->priority->name ?? '' }}
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
                        {{ $ticket->employee->first_name ?? '' }}  {{ $ticket->employee->last_name ?? '' }}
                    </td>
                </tr>


                </tbody>

            </table>
        </div>


       <div class="d-inline" style="margin-right: 150px">
          <b> Firma ITO</b> ______________________________________________
       </div>
        <br>
        <br>
        <br>
        <br>
        <div class="d-inline">
           <b>Firma Propietario </b>______________________________________________
        </div>

    </div>


</div>

<b>
    Por favor confirmar y firmar donde corresponda.
</b>

</body>
</html>
