@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>Portraiteintrag erstellen</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				<label for="input_image">
				<input name="input_image" id="fileupload" type="file" accept="image/*" class="fileupload" data-preview-file-type="text">
			</div>
			<div class="form-group">
				<label for="title">Titel</label>
				<input class="form-control" type="text" name="title" id="title">
			</div>
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" id="name">
			</div>
			<div class="form-group">
				<label for="description">Beschreibung</label>
				<textarea name="description" class="form-control my-editor" rows="10" id="description"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Speichern</button>
			</div>
		</form>
	</div>

@stop