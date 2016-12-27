@extends('layouts.app')

@section('content')

	<div class="container">
		<form action="" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<h1>Home</h1>
			<div class="form-group">
				<textarea name="text" class="form-control my-editor" rows="10">{{ $home->text }}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Absenden</button>
			</div>
		</form>
	</div>

@stop