<?php
	$arrayArea = array();
	//<?php echo $arrayArea;
	$arrayArea[0]='Sin definir-'; 
	foreach ($areas as $i => $area) {
	$arrayArea[$i+1]=$area->name.'-';
	}
?>

@extends('layouts.routes.downtwice')

@section('menus')

 @include('menus.empty')

@stop

@section('principal')

<div id="main-wrapper">
	<div class="container">
		<div class="row">

 			<!-- SECCION PARA EL NOMBRE DE LA CONFIGURACION DEPENDIENDO EL USUARIO
 			@yield('name')
 			-->
 
			<div class="12u 12u(mobile)">
				<header>
					@if($user->type == 1)
					<center><h2 class="config">CONFIGURAR CUENTA DOCENTE</h2></center>			
					@else
					<center><h2 class="config">CONFIGURAR CUENTA PUBLICADOR</h2></center>
					@endif
				</header>
			</div>

			<div class="2u 12u(mobile)"></div>

			<!-- Content -->
			<div class="8u 12u(mobile)">
				<section class="box">
				@if(Session::has('flash_message'))
   					 <div class="alert alert-success">
      				  {{ Session::get('flash_message') }}
  					  </div>
				@endif
				@can('owner', $user)
					@if($user->activedMe)
						{!! Form::model($user, [
						'id' => 'valForm',
	    				'method' => 'PATCH',
						 'route' => ['user.update', $user->id],
						 'files' => true
						]) !!}
							{!! csrf_field() !!}

							<div class="row uniform">

								<div class="12u 12u$(xsmall)">
									<div class="form-group">	
									<label class="control-label col-xs-4"><h2>{{ $user->username }} </h2></label>
									<div class="col-xs-8">
									<!--<a class="forgot btn-link" href="#">Cambiar contraseña</a>
									--></div></div>
								</div>
								<!--
								<div class="12u 12u$(xsmall)">
									<div class="form-group">
									@if($user->photo != null)
									<img class="control-label col-xs-3" src="{{url('uploads/photo/'.$user->id.'/'.$user->photo)}}" alt="" />
									@else
									<img class="control-label col-xs-3" src="{{url('images/user.png')}}" alt="" />
									@endif
									<div class="col-xs-1"></div>
									<div class="col-xs-8">
									<label class="control-label col-xs-4"><h4>Cambiar foto</h4></label>		
									</div>
									<div class="col-md-6">
                					<input type="file" name="photo">
                					@if ($errors->has('photo'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('photo') }}</strong>
				                        </span>
				                    @endif
						            </div>
									<div class="col-xs-12">
									<a class="forgot btn-link" href="#"> </a>
									</div></div>
								</div>
								--><!--<img class="control-label col-xs-3" src="{{url('uploads/photo/'.$user->id.'/'.$user->photo)}}" alt="" />-->
									
								<div class="12u 12u$(xsmall)">
									<div class="form-group">
									<label class="control-label col-xs-4">Nombres y Apellidos</label>
									<div class="col-xs-8">
									<input type="text" name="fullname" value="{{ $user->fullname }}" />
									</div>
									</div>
								</div>
								<div class="12u$">
									<div class="form-group">
									<label class="control-label col-xs-4">Correo Electrónico</label>
									<div class="col-xs-8">
									<input type="email" name="email" required class="form-control" value="{{ $user->email }}" />
									</div>
									@if ($errors->has('email'))
				                        <span class="help-block">
				                            <strong>{{ $errors->first('email') }}</strong>
				                        </span>
				                    @endif
				                	</div>
								</div>
								<div class="12u$">
									<div class="form-group">
									<label class="control-label col-xs-4">Institución</label>
									<div class="col-xs-8">
									<select name="academic_institution" class="form-control" />
										<option>{{ $user->academicInstitution->name}}</option>
										@foreach($academic_institutions as $academic_institution)
											@if($user->academicInstitution->name != $academic_institution->name)
											<option>{{ $academic_institution->name }}</option>
											@endif
										@endforeach
									</select>
									</div>
									</div>
								</div>

								<!-- SECCION AREAS DE ITNERES PARA USUARIO DOCENTE
								@yield('interes')
								-->

								@if($user->type == 1)

									<div class="12u 12u$(xsmall)">
										<div class="form-group">
										<label class="control-label col-xs-4">Áreas de interés</label>
								      	<a class="control-label col-xs-1" 
									    href="javascript:crearArea('<?php echo implode($arrayArea) ?>'.split('-'))" >
									    	<i class="glyphicon glyphicon-plus"></i>
									    </a>
									    <a class="control-label col-xs-6"></a>
									    <a class="control-label col-xs-1" 
									    href="javascript:eliminarArea()">
									    	<i class="glyphicon glyphicon-remove"></i>
									    </a>
								        
								      	<div class="col-xs-8" id="listArea">
								      		@foreach($name as $i => $areaSelected)
									      		@if($i == 0)
												<select class="form-control" id="Unremove" required name="area[]">             
													@else
													<select class="form-control" id="selectArea" required name="area[]">             
												@endif
													<option>{{ $areaSelected}}</option>
													@foreach($areas as $area)
														<option>{{ $area->name }}</option>
													@endforeach
												</select>
											@endforeach
								     	</div> 
								     	</div>
									</div>
								@else
									<div class="12u 12u$(xsmall)">
									<div class="form-group">
									<label class="control-label col-xs-4">Cargo</label>
									<div class="col-xs-8">
									@if($user->chargue == null)
										<input type="text" name="chargue" placeholder="Ingrese su cargo" />
										@else
										<input type="text" name="chargue" value="{{ $user->chargue }}" />
										@endif
									</div>
									</div>
								</div>
								@endif

									<div class="12u 12u$(xsmall)">
										<div class="form-group">
										<label class="control-label col-xs-4">Celular</label>
										<div class="col-xs-8">
										@if($user->phone == null)
										<input type="text" name="phone" placeholder="Ingrese su número telefónico" />
										@else
										<input type="text" name="phone" value="{{ $user->phone }}" />
										@endif
										</div>
										</div>
									</div>

									
								@if($user->type == 1)
										<div class="12u$">
											<div class="form-group">
											<label class="control-label col-xs-4">Recibir notificaciones al correo</label>
											<div class="col-xs-8">
											<select name="receive_notificacions" class="form-control" />
												@if($user->receive_notifications)
												<option>Sí</option>
												<option>No</option>
												@else
												<option>No</option>
												<option>Sí</option>
												@endif
											</select>
											</div>
											</div>
										</div>								
								@endif

									<div class="12u 12u$(xsmall)">
										<div class="form-group">
										
										<label class="control-label col-xs-4">Contacto</label>
										<div class="col-xs-8">
										@if($user->contact == null)
										<textarea name="contact" rows="4"></textarea>
										@else
										<textarea name="contact" rows="4">{{ $user->contact }}</textarea>
										@endif
										</div>
									</div>
									<div class="12u$">
										<ul class="actions">
											<center>
												<li><button type="submit" class="button big special icon fa-save">
					                        		Guardar
					                    		</button></li>
												<li><a href="/desactived_me" class="button alt2 special icon fa-power-off">Desactivar cuenta</a></li>
												<li><a href="/" class="button alt special icon fa-close">Cancelar</a></li>
											</center>
										</ul>
									</div>
							</div>
						{!! Form::close() !!}
					@else
						<body>
					        <div class="container1">
					            <div class="content">
					                <center><a href="/actived_me" class="button big special">Activar cuenta</a></center>
					            </div>
					        </div>
					    </body>
					@endif	
				@else
						<body>
					        <div class="container">
					            <div class="content">
					                <div class="title">¿Hasta dónde intenta llegar? 
					                Aquí encontrará información no autorizada para su tipo de usuario.</div>
					            </div>
					        </div>
					    </body>
				@endcan
				</section>
			</div>
		</div>
	</div>
</div>
@endsection