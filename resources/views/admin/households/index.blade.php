@extends('layouts.admin')
@section('content')
@can('households_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.households.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.households.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.households.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Category">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.households.fields.id') }}
                        </th>

                        <th>
                            {{ trans('cruds.projects.fields.Region') }}
                        </th>

                        <th>
                            {{ trans('cruds.projects.fields.Province') }}
                        </th>

                        <th>
                            {{ trans('cruds.projects.fields.commune') }}
                        </th>

                        <th>
                            {{ trans('cruds.households.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.first_name') }} Propietario
                        </th>

                        <th>
                            {{ trans('cruds.user.fields.last_name') }} Propietario
                        </th>

                        <th>
                            {{ trans('cruds.user.fields.rut') }} Propietario
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }} Propietario
                        </th>

                        <th>
                            {{ trans('cruds.projects.title_singular') }}
                        </th>



                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($households as $key => $household)
                        <tr data-entry-id="{{ $household->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $household->id ?? '' }}
                            </td>
                            <td>
                                {{ $household->nameRegion ?? '' }}
                            </td>
                            <td>
                                {{ $household->nameProvince ?? '' }}
                            </td>
                            <td>
                                {{ $household->nameCommune ?? '' }}
                            </td>
                            <td>
                                {{ $household->address ?? '' }}
                            </td>
                            <td>
                                {{ $household->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $household->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $household->rut ?? '' }}
                            </td>

                            <td>
                                {{ $household->email ?? '' }}
                            </td>

                            <td>
                                {{ $household->nameProject ? $household->nameProject. ' - ' . $household->codeProject : '' }} - {{($household->statusProject == 1)? 'Activo':  (($household->statusProject == 2)? 'Finalizado' : '')}}
                            </td>
                            <td>
                                @can('households_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.households.show', $household->id ) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('households_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.households.edit', $household->id ) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('households_delete')
                                    <form action="{{ route('admin.households.destroy',$household->id ) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.categories.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Category:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
