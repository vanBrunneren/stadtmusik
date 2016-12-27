@extends('public.layout')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				{!! $celebration->text !!}
			</div>
		</div>
	</div>

@stop