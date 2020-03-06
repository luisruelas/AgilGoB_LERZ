@extends('layouts.basic')
@section('current_index')
	<span class="sr-only">(current)</span>
@endsection
@section('content')
	<div class="container">
		@if(!empty(session('message')))
			<div class="row mt-3">
				<div class="col-lg12">
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
				</div>	
			</div>
		@endif
		<div class="row">
			<div class="col-lg-12">
				<h1>Visualizador de Usuarios</h1>
				<div style="margin-bottom: 20px">
					<a class="btn btn-primary" href="{{route('user.create')}}" style="color: white">Crear Usuario</a>
				</div>
				<table class="table responsive">
					<th>Nick</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Rol</th>
					<th>Correo</th>
					<th>Acciones</th>
					@foreach($users as $user)
					<tr>
						<td>{{$user->nick}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->last_name}}</td>
						<td>{{$user->type->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							<a href="{{route('user.edit',$user->id)}}" style="color: white; display:inline" class=""><button class="btn btn-primary"><i class="fa fa-edit"></i></button></a>
							{{Form::open(['route'=>['user.destroy',$user->id], 'method'=>'DELETE'])}}
							<button type='submit' style="color: white; display:inline" class="btn btn-danger"><i class="fa fa-trash"></i></button>
							{{Form::close()}}
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection