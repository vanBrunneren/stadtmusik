@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h1>Portraiteintrag bearbeiten</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				<label for="image">Portrait Bild</label>
				<img class="img-responsive admin-image" src="{{ $portrait->imagepath }}">
				<input name="input_image" id="fileupload" type="file" accept="image/*" class="fileupload" data-preview-file-type="text">
			</div>
			<div class="form-group">
				<label for="title">Titel</label>
				<input class="form-control" type="text" name="title" id="title" value="{{ $portrait->title }}">
			</div>
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" id="name" value="{{ $portrait->name }}">
			</div>
			<div class="form-group">
				<label for="description">Beschreibung</label>
				<textarea name="description" class="form-control my-editor" rows="10" id="description">{{ $portrait->shortDescription }}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Speichern</button>
			</div>
		</form>
	</div>

@stop