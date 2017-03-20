@extends('public.layout')

@section('content')

	<div class="container">
		@forelse($news as $entry)

			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
					<h1>{{ $entry->title }}</h1>
				</div>
				<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
					<p style="font-size: 10px">{{ date('d.m.Y', strtotime($entry->created_at)) }}</p>
				</div>
				<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
					{!! $entry->text !!}
				</div>
				<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
					<hr>
				</div>
			</div>

		@empty

			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
					<h3>Momentan sind keine News vorhanden.</h3>
				</div>
			</div>

		@endforelse
	</div>

@stop