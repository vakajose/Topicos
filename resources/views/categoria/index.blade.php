@extends('adminlte::page')


@section('title', 'Topicos | Categorias')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap-colorpicker-2.5.2/dist/css/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/fontawesome-iconpicker-3.0.0/dist/css/fontawesome-iconpicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendor/fontawesome-free-5.4.2-web/css/all.min.css')}}">
@stop
@section('content_header')
    <h1>Listado de Categorias</h1>
@stop

@section('content')
<div class="row">
  
    <div class="container">
    	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Categoria</h3>
            </div>
            <!-- /.box-header -->
           
            <form action="{{ route('categoria.store') }}" method="POST" class="form-inline">
            	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la categoria" autocomplete="off">
                <!--    <input type="text" name="color" id="color" class="form-control"> -->
                    <input id="color" type="text" class="form-control" value="#5367ce" name="color" autocomplete="off" />
                    <input type="text" name="icon" id="icon" class="form-control" autocomplete="off">
                    <select class="form-control" name="estado" ><option value="Activo">Activo</option><option value="Inactivo">Inactivo</option></select> 
                </div>
                <div class="form-group">
                	<button type="submit" class="btn btn-info pull-left">Guardar</button>
                </div>
              </div>
              <!-- /.box-body -->
            </form>
           
        </div>
    	<div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Categorias</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
              	<thead>
                <tr>
                  
                  <th style="width: 20px"></th>                  
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th style="width: 160px">Opciones</th>
                </tr>
                </thead>
                <tbody>

                	@foreach ($categorias as $categoria)
                  		<tr>
                  		
                        <td><i class="{{$categoria->icon}}"></i></td>
                  			<td>{{ $categoria->nombre }}</td>
                  			<td>{{$categoria->estado}}</td>
                  			<td><button class="edit-modal btn btn-sm btn-primary" data-id="{{$categoria->id}}" data-nombre="{{$categoria->nombre}}" > <i class="fas fa-edit"></i></button>
                  				<form action="{{ route('categoria.destroy',['categoria'=>$categoria->id]) }}" method="POST" class="inline">
                  					{{ csrf_field() }}
                  					{{ method_field('DELETE') }}
                  						<button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>                 					
 						         </form>	
                  			</td>
                  		</tr>
                  	@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
 </div>
   
    <!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" action="{{ route('categoria.index') }}">
                      {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_edit" autofocus>
                                <!-- <p class="errorTitle text-center alert alert-danger hidden"></p> -->
                            </div>
                        </div>
                        
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal" onclick="{{ route('categoria.index') }}">
                            <span class='glyphicon glyphicon-check'></span> Editar
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
		
		<!-- Delay table load until everything else is loaded -->
    {{-- <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script> --}}

    <!-- AJAX CRUD operations -->
    <script type="text/javascript">

    	$(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Editar categoria');
            $('#id_edit').val($(this).data('id'));
            $('#nombre_edit').val($(this).data('nombre'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'categoria/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'nombre': $('#nombre_edit').val(),
                },
          	});
        });
    </script>
	<script src="{{ asset('vendor/bootstrap-colorpicker-2.5.2/dist/js/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{asset('vendor/fontawesome-iconpicker-3.0.0/dist/js/fontawesome-iconpicker.min.js')}}"></script>
  <script src="{{ asset('js/reclamoMap.js') }}"></script>
   <script>
              $(function(){
             $('#color').colorpicker({ 
            });
            $('#icon').iconpicker();
              });
    </script>
@stop