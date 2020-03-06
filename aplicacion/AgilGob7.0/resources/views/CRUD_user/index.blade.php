@extends('layouts.basic')
@section('current_index')
	<span class="sr-only">(current)</span>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1>Visualizador de Usuarios</h1>
				<div style="margin-bottom: 20px">
					<a class="btn btn-primary" href="{{route('create')}}" style="color: white">Crear</a>
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
							<span class="btn btn-primary"><i class="fa fa-edit"></i></span>
							<span class="btn btn-danger"><i class="fa fa-trash"></i></span>
							<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection