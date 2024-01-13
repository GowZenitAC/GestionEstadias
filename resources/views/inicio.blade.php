@extends('layout.app')
@section('titulo','Inicio')
@section('contenido')
	
	<!-- INICIA VUE -->
	<div id="inicio">
        <h1>inicio</h1>
 


	</div>
	<!-- TERMINA VUE -->

	
@endsection

@push('scripts')
	
@endpush

<input type="hidden" name="route" value="{{url('/')}}">