@extends('adminlte::page')

@section('title', 'Topicos | Reclamos')

@section('content_header')
    <h1>Reclamos</h1>
@stop
@section('css')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/reclamoMap.css') }}">
@stop
@section('content')

<div class="row">
	<div class="container col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-12">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Ultimos Reclamos</h3>
			<div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
              </div>
		</div>
		<div class="box-body">
		<table class="table table-condensed table-hover" id="reclamos_table">
		<thead>
			<tr>			
				<th>ID</th>				
				<th>Titulo</th>
				<th>Estado</th>
				<th>Catg</th>
			</tr>
		</thead>
		<tbody>
			@if (empty($reclamos))
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			@endif
			@foreach ($reclamos as $reclamo)
				<tr>
					<td>{{ $reclamo->id }}</td>
					<td>{{ $reclamo->titulo }}</td>
					<td>{{ $reclamo->estado }}</td>
					<td>{{ $reclamo->categoria->nombre }}</td>
				</tr>
			@endforeach
			
		</tbody>
		</table>
		</div>
	</div>

	</div>
<div class="container col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 fill">
	
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Mapa</h3>
			
		</div>
		<div class="box-body">				
				<div class="container-fluid" id="map"></div>
		</div>
	</div>
</div>
</div>


@stop

@section('js')
<script> var reclamos = @json($reclamos)</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDafbgSKYGyoUoTMYnsaks1D5-wShZ9m_w&callback=initMap" async defer></script>
<script src="{{ asset('js/reclamoMap.js') }}"></script>
@stop

