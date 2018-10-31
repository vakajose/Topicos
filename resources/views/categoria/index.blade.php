@extends('adminlte::page')

@section('title', 'Topicos | Categorias')

@section('content_header')
    <h1>Listado de Categorias</h1>
@stop

@section('content')
    <div class="container-fluid">
    	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Categoria</h3>
            </div>
            <!-- /.box-header -->
           
            <form action="{{ route('categoria.store') }}" method="POST" class="form-inline">
            	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la categoria">
                  
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
                  <th style="width: 10px">#</th>
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th style="width: 160px">Opciones</th>
                </tr>
                </thead>
                <tbody>

                	@foreach ($categorias as $categoria)
                  		<tr>
                  			<td>{{ $categoria->id }}</td>
                  			<td>{{ $categoria->nombre }}</td>
                  			<td>Sin estado</td>
                  			<td><button class="edit-modal btn btn-sm btn-primary" data-id="{{$categoria->id}}" data-nombre="{{$categoria->nombre}}" > <i class="fa fa-pencil"></i></button>
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
    
    <!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
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
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
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
                type: 'GET',
                url: 'categoria/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'nombre': $('#nombre_edit').val(),
                },
          	});
        });
    </script>
	
@stop