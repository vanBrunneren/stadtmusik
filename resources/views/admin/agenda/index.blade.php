@extends('layouts.app')

@section('content')

	<div class="container">
		<form action="" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<h1>Agenda</h1>
			<div class="form-group">
				<a href="/admin/agenda/create"><button type="button" class="btn btn-primary">Neuer Termin erfassen</button></a>
				<a href="/admin/categories/index"><button type="button" class="btn btn-info">Neue Kategorie erfassen</button></a>
			</div>
			<div class="form-group">
				<select class="form-control" id="category_selecter">
				  	<option value="0">Alle Kategorien</option>
				  	@foreach($categories as $cat)
				  		@if($id == $cat->id)
				  			<option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
				  		@else
				  			<option value="{{ $cat->id }}">{{ $cat->name }}</option>
				  		@endif
				  	@endforeach
				</select>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Name</th>
						<th>Datum und Zeit</th>
						<th>Ort</th>
						<th>Kategorie</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($agendas as $agenda)

					<tr>
						<td><a href="/admin/agenda/edit/{{ $agenda->id }}">{{ $agenda->name }}</a></td>
						<td>{{ $agenda->date }}</td>
						<td>{{ $agenda->location }}</td>
						<td>{{ $agenda->category_name }}</td>
						<td class="text-right">
							<a href="/admin/agenda/edit/{{ $agenda->id }}"><span class="glyphicon glyphicon-pencil"></span></a>
							<a href="/admin/agenda/delete/{{ $agenda->id }}"><span class="glyphicon glyphicon-remove"></span></a>
						</td>
					</tr>

				@endforeach
				</tbody>
			</table>
		</form>
	</div>

@stop