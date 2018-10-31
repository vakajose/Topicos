@extends('adminlte::page')

@section('title', 'Topicos | Estadisticas')

@section('content_header')
    <h1>Estadisticas de reclamos</h1>
@stop

@section('content')
	
<div class="row">
	<div class="container col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Por categoria</h3>
				<div class="box-tools pull-right">
            		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            		</button>
          		</div>	
			</div>
			<div class="box-body">
				<div class="row">
					
				</div>
				<div class="row">
					<canvas id="pieChart" style="height:250px"></canvas>
				</div>
			</div>
		</div>
	</div>
	<div class="container col-xs-12 col-sm-12 col-md-6 col-lg-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Reclamos por fecha</h3>
				<div class="box-tools pull-right">
            		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            		</button>
          		</div>	
			</div>
			<div class="box-body"></div>
		</div>
	</div>
</div>
    
@stop

@section('js')
	<script src="{{ asset('js/estadisticas.js') }}"></script>
@stop