@extends('administrador_index')

@section('content')
<div class="col-md-12">
    <!-- USERS LIST -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Listado de Usuarios del Sistema</h3>

            <div class="box-tools pull-right">                
                <a href="{{URL::to('usuarios/crear')}}" class="btn btn-box-tool" ><i class="fa fa-user-plus"></i> Nuevo Usuario</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            @if(count($usuarios) > 0)
            <ul class="users-list clearfix">
                @foreach($usuarios as $u)
                <li>
                    @if($u->rol_id == 1)
                    {!! Html::image('img/usuario_admin.png', 'Icono', array('alt'=>"User Image")) !!}
                    @else
                    {!! Html::image('img/usuario.png', 'Icono', array('alt'=>"User Image")) !!}
                    @endif
                    <!--<img src="dist/img/user1-128x128.jpg" alt="User Image">-->
                    @if(Auth::user()->id != $u->id)
                    <a class="users-list-name" href="#">{!! $u->user !!}</a>  
                    @else
                    <a class="users-list-name" href="#">Yo</a>
                    @endif
                    @if($u->rol_id == 1)
                    <span class="users-list-date">Administrador</span>
                    @else
                    <span class="users-list-date">Ventas</span>
                    @endif           

                    @if(Auth::user()->id != $u->id)
                    <span class="users-list-date"><a href="{{URL::to('usuarios/editar/'.$u->id)}}">Editar</a></span>
                    <span class="users-list-date" onclick="confirmar('{{$u->id}}','{{$u->user}}')"><a href="#" onclick="eliminar()" data-toggle="modal" data-target="#myModal">Eliminar</a></span>
                    @endif
                </li>
                @endforeach           
            </ul>
            @else
            No hay..
            @endif

            <!-- /.users-list -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">

        </div>
        <!-- /.box-footer -->
    </div>
    <!--/.box -->

</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirmación</h4>
            </div>
            {!! Form::open(array('url' => 'usuarios/eliminar', 'class' => 'form-horizontal', 'method' => 'post')) !!}
            <div class="modal-body">
                ¿Está segur@ que desea eliminar el Usuario <strong id="user"></strong>?
                <input type="hidden" id="id" name="id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"> </i> NO</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"> </i> SI</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<script>
    function confirmar(id, user){
        $('#user').html(user);
        $('#id').val(id);
    }
</script>
@endsection
