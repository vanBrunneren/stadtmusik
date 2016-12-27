@extends('public.layout')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
				{!! $home->text !!}
			</div>
		</div>
	</div>

@stop