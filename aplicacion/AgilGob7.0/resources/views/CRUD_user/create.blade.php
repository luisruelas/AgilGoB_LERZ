@extends('layouts.basic')
@section('current_index')
	<span class="sr-only">(current)</span>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				@if($user)
					{{Form::open($user,['action'=>{{route('store')}}])}}
				@else
					{{Form::open(['action'=>{{route('store'),'method'=>'post'])}}
				@endif
			</div>
		</div>
	</div>
@endsection