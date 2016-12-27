@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>Kategorie bearbeiten</h1>
		<form action="" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Speichern</button>
			</div>
		</form>
	</div>

@stop