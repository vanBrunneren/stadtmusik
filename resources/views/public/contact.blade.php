@extends('public.layout')

@section('content')

	@if(session()->has('message'))
		<div class="alert alert-success">
			{{ session()->get('message') }}
		</div>
	@endif

	<div class="content-title">
		<h1>Kontakt</h1>
		<h3>Allgemeine Adresse</h3>
		<p>Stadtmusik Lenzburg</p>
		<p>Postfach 601</p>
		<p>5600 Lenzburg</p>
	</div>
	
	<div class="contact-form">
		<form action="" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<h3 class="content-title">Kontaktformular</h3>
			@if (count($errors) > 0)
				<div class="col-xs-12">
				    <div class="alert alert-danger">
				        Bitte füllen Sie alle benötigten Felder aus
				    </div>
			    </div>
			@endif
			<div class="col-md-6">
				<div class="form-group">
					@if($errors->has('inputPrename')) 
						<label for="inputPrename" class="form-error-text">* Vorname</label>
						<input name="inputPrename" type="text" class="form-control form-error-form" id="inputPrename" placeholder="Vorname" value="{{ old('inputPrename') }}">
					@else
						<label for="inputPrename">* Vorname</label>
						<input name="inputPrename" type="text" class="form-control" id="inputPrename" placeholder="Vorname" value="{{ old('inputPrename') }}">
					@endif
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					@if($errors->has('inputName')) 
						<label for="inputName" class="form-error-text">* Name</label>
						<input name="inputName" type="text" class="form-control form-error-form" id="inputName" placeholder="Name" value="{{ old('inputName') }}">
					@else
						<label for="inputName">* Name</label>
						<input name="inputName" type="text" class="form-control" id="inputName" placeholder="Name" value="{{ old('inputName') }}">
					@endif
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-group">
					@if($errors->has('inputEmail')) 
						<label for="inputEmail" class="form-error-text">* Email Adresse</label>
						<input name="inputEmail" type="email" class="form-control form-error-form" id="inputEmail" placeholder="Email Adresse" value="{{ old('inputEmail') }}">
					@else
						<label for="inputEmail">* Email Adresse</label>
						<input name="inputEmail" type="email" class="form-control" id="inputEmail" placeholder="Email Adresse" value="{{ old('inputEmail') }}">
					@endif
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-group">
					@if($errors->has('inputSubject')) 
						<label for="inputSubject" class="form-error-text">* Betreff</label>
						<input name="inputSubject" type="text" class="form-control form-error-form" id="inputSubject" placeholder="Betreff" value="{{ old('inputSubject') }}">
					@else
						<label for="inputSubject">* Betreff</label>
						<input name="inputSubject" type="text" class="form-control" id="inputSubject" placeholder="Betreff" value="{{ old('inputSubject') }}">
					@endif
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-group">
					@if($errors->has('inputMessage')) 
						<label for="inputMessage" class="form-error-text">* Nachricht</label>
						<textarea name="inputMessage" id="inputMessage" class="form-control form-error-form" rows="5">{{ old('inputMessage') }}</textarea>
					@else
						<label for="inputMessage">* Nachricht</label>
						<textarea name="inputMessage" id="inputMessage" class="form-control" rows="5">{{ old('inputMessage') }}</textarea>
					@endif
				</div>
			</div>
			<div class="col-xs-12">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Absenden</button>
				</div>
			</div>
		</form>
	</div>


@stop