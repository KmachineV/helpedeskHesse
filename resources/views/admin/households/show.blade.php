@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.households.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.households.fields.id') }}
                        </th>
                        <td>
                            {{ $households->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.households.fields.address') }}
                        </th>
                        <td>
                            {{ $households->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.households.fields.information') }}
                        </th>
                        <td>{{ $households->information }} </td>
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
