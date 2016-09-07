@extends('administrador_index')

@section('content')
<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Editar Usuario <strong>{{$user}}</strong></h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open(array('url' => 'usuarios/editar_usuario', 'class' => 'form-horizontal', 'method' => 'post')) !!}
        <div class="box-body">
            <div class="form-group">
                <input type="hidden" name="id" value="{{$id}}">
                <label for="inputNombrel3" class="col-sm-2 control-label">Nombre</label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNombrel3" placeholder="Nombre" name="nombre" value="{{$user}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="{{$email}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="pass">
                </div>
            </div>
            <div class="form-group">
                <label for="inputTipo3" class="col-sm-2 control-label">Rol de Usuario</label>

                <div class="col-sm-10">
                    <select name="rol" class="form-control"> 
                        <option value="x">Seleccione un Rol...</option>
                        <option value="1">Administrador</option>
                        <option value="2">Ventas</option>
                    </select>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{URL::to('usuarios')}}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
            <button type="submit" class="btn btn-success pull-right"><i class="fa fa-check"></i> Editar</button>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
    <!-- /.box -->
    <!-- /.box -->
</div>


@endsection
