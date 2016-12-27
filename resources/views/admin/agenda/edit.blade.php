@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>{{ $agenda->name }}</h1>
		<form action="" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<div class="form-group">
				<label for="date">Datum</label>
				 <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="date" class="form-control" id="date" value="{{ $agenda->date }}"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
			</div>
			<div class="form-group">
				<label for="name">Name</label>
				<input class="form-control" type="text" name="name" id="name" value="{{ $agenda->name }}">
			</div>
			<div class="form-group">
				<label for="location">Ort</label>
				<input class="form-control" type="text" name="location" id="location" value="{{ $agenda->location }}">
			</div>
			<div class="form-group">
				<label for="category">Kategorie</label>
				<select class="form-control" name="category">
					@foreach($categories as $category)

						@if($category->id == $agenda->category_id)
							<option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
						@else
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endif


					@endforeach
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Speichern</button>
			</div>
		</form>
	</div>

@stop