<?php
	$arrayArea = array();
	//<?php echo $arrayArea;
	$arrayArea[0]='Sin definir-'; 
	foreach ($areas as $i => $area) {
	$arrayArea[$i+1]=$area->name.'-';
	}
?>
@extends('layouts.routes.routedown')

@section('menus')

	@include('menus.empty')	

@stop

@section('principal')
<div id="main-wrapper">
	<div class="container">
		<div class="row">
			<div class="12u 12u(mobile)">
				<center><h2 class="count">AGREGAR EVENTOS ACADÉMICOS</h2></center>			
			</div>
			<div class="2u 12u(mobile)"></div>

			<div class="8u 12u(mobile)">
					@yield('alert')
				<section class="box">
			   		<div class="row uniform">
						<p>Campos obligatorios *</p>
					</div>
				
					<hr>
			        <div class="row uniform">
			        {!! Form::open(['id' => 'valForm', 'route' => 'academic_event.store', 'method' => 'POST']) !!}
			         {!! csrf_field() !!}	
				            
			             @include('publication.create')

			            <div class="form-group">
                            <div class="field">
                                <textarea name="contacto" id="contacto " placeholder="Contacto" rows="2"></textarea>
                            </div>
                        </div>

			             @include('publication.add')
			        {!! Form::close() !!}
			    
			    </section>
			</div>
        </div>
    </div>
</div>


@endsection
