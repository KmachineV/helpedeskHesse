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
                <input type="text" id="rut" name="rut" placeholder="ej: 11111111-1" class="form-control" value="{{ old('rut', isset($user) ? $user->rut : '') }}" required>
                @if($errors->has('rut'))
                    <em class="invalid-feedback">
                        {{ $errors->first('rut') }}
                    </em>
                @endif
                <p class="helper-block rutHelperError">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>

            </div>
            <p id="rutHelperError">
                {{ trans('cruds.user.fields.name_helper') }}
            </p>


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

            <div class="form-group">
            <input class="check-circle" type="checkbox" value="" id="checkIto"><h5 style="display: inline"> <strong>¿Es Tipo ITO?</strong></h5>
            </div>

            <div class="form-group {{ $errors->has('projectid') ? 'has-error' : '' }}" id="projectCheck">
                <label for="status">{{ trans('cruds.user.fields.project_id') }}*</label>
                <select name="projectid" id="projectid" class="form-control select2">
                    <option value="">Selecciona</option>
                    @foreach($projects as $id => $project)
                        <option value="{{ $project->id }} " selected}} >{{$project->name}} - {{$project->code }}  - {{$project->status == 1 ? 'Activo' : 'Finalizado' }}</option>
                    @endforeach
                </select>
                @if($errors->has('projectid'))
                    <em class="invalid-feedback">
                        {{ $errors->first('projectid') }}
                    </em>
                @endif
            </div>
<!--
&lt;!&ndash;

            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.households.fields.address') }}*</label>
                <textarea type="text" id="address" name="address" class="form-control"required>    </textarea>
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
                <label for="content">Informacion de la direccion</label>
                <textarea type="text" id="information" name="information" class="form-control" required> </textarea>
                @if($errors->has('information'))
                    <em class="invalid-feedback">
                        {{ $errors->first('information') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.households.fields.name_helper') }}
                </p>
            </div>
&ndash;&gt;
-->


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
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'Selecciona' : '' }}>{{ $roles }}</option>
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
@section('scripts')
    @parent
    <script>
        $( "#checkIto" ).on( 'change',function() {
            if($('#checkIto').is(':checked')){
                $("#projectCheck").hide();
            }else{
                $("#projectCheck").show();
            }
        });

        var Fn = {
            // Valida el rut con su cadena completa "XXXXXXXX-X"
            validaRut : function (rutCompleto) {
                rutCompleto = rutCompleto.replace("‐","-");
                if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
                    return false;
                var tmp 	= rutCompleto.split('-');
                var digv	= tmp[1];
                var rut 	= tmp[0];
                if ( digv == 'K' ) digv = 'k' ;

                return (Fn.dv(rut) == digv );
            },
            dv : function(T){
                var M=0,S=1;
                for(;T;T=Math.floor(T/10))
                    S=(S+T%10*(9-M++%6))%11;
                return S?S-1:'k';
            }
        }


        $("#rut").on('change', function(){
            if (Fn.validaRut( $("#rut").val() )){
                console.log("El rut ingresado es válido :D");
                document.getElementById('rutHelperError').innerHTML='El RUT ingresado es valido';
                document.getElementById('rutHelperError').style ="color: green"

            } else {
                document.getElementById('rutHelperError').innerHTML='El RUT ingresado no es valido';
                document.getElementById('rutHelperError').style ="color: red"
            }
        });
    </script>
@endsection
