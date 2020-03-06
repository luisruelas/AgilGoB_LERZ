@extends('layouts.basic')
@section('current_create')
	<span class="sr-only">(current)</span>
@endsection
@section('content')
@if(!empty($user))
	{{Form::model($user, ['route' => ['user.update', $user->id], 'method'=>'put'])}}
@else
	{{Form::open(['action'=>'UserController@store','method'=>'post'])}}
@endif
	<div class="container">
		@if ($errors->any())
		<div class="row">
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		</div>
		@endif
		<div class="row">
			<div class="col-lg-4">
				@csrf
				{{Form::label('nick','Nick')}}
				{{Form::text('nick',null,['class'=>'form-control','id'=>'nick'])}}
			</div>
			<div class="col-lg-6">
				{{Form::label('name','Nombre')}}
				{{Form::text('name',null,['class'=>'form-control','id'=>'name'])}}
			</div>
			<div class="col-lg-6">
				{{Form::label('last_name','Apellido')}}
				{{Form::text('last_name',null,['class'=>'form-control','id'=>'last_name'])}}
			</div>
			<div class="col-lg-4">
				{{Form::label('email','Correo Electrónico')}}
				{{Form::email('email',null,['class'=>'form-control','id'=>'email'])}}
			</div>
			<div class="col-lg-4">
				{{Form::label('Rol','Rol')}}
				{{Form::select('user_type_id',[$user_types->pluck('name','id')],null,['class'=>'form-control','id'=>'email'])}}
			</div>
			@if(!empty($user))
				<div class="col-lg-4">
					{{Form::label('password','Contraseña')}}
					{{Form::password('password',['class'=>'form-control','id'=>'password','placeholder'=>'Cambiar'])}}
				</div>
			@else
				<div class="col-lg-4">
					{{Form::label('password','Contraseña')}}
					{{Form::password('password',['class'=>'form-control','id'=>'password'])}}
				</div>
			@endif
			<div class="col-lg-12 mt-4">
				{{Form::submit('Crear',['class'=>'btn btn-primary'])}}
			</div>
		</div>
	</div>
{{Form::close()}}
@endsection