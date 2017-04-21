@extends('public.layout')

@section('content')

	<div class="container">
		@forelse($news as $entry)

			<div class="row">
				<div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
					<h1>{{ $entry->title }}</h1>
				</div>
				<div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
					<p style="font-size: 10px">{{ date('d.m.Y', strtotime($entry->created_at)) }}</p>
				</div>
				<div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
					{!! $entry->text !!}
				</div>
				<div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
					<hr>
				</div>
			</div>

		@empty

			<div class="row">
				<div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
					<h3>Momentan sind keine News vorhanden.</h3>
				</div>
			</div>

		@endforelse
	</div>

@stop