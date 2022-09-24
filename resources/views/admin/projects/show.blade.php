@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.projects.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.id') }}
                        </th>
                        <td>
                            {{ $projects->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.code') }}
                        </th>
                        <td>
                            {{ $projects->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.name') }}
                        </th>
                        <td>{{ $projects->name }} </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.Region') }}
                        </th>
                        <td>{{ $projects->region }} </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.Province') }}
                        </th>
                        <td>{{ $projects->province }} </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.commune') }}
                        </th>
                        <td>{{ $projects->commune }} </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.start_project') }}
                        </th>
                        <td>{{ $projects->startProject }} </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.end_project') }}
                        </th>
                        <td>{{ $projects->endProject }} </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.end_warranty') }}
                        </th>
                        <td>{{ $projects->endWarranty }} </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.projects.fields.status') }}
                        </th>
                        <td>{{ $projects->status = 1? 'Activo' : 'Finalizado' }} </td>
                    </tr>


                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
