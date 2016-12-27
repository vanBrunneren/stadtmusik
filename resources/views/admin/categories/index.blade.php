@extends('layouts.app')

@section('content')

	<div class="container">
		<form action="" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<h1>Kategorien</h1>
			<div class="form-group">
				<a href="/admin/categories/create"><button type="button" class="btn btn-primary">Neue Kategorie erfassen</button></a>
			</div>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
				@foreach($categories as $category)

					<tr>
						<td><a href="/admin/categories/edit/{{ $category->id }}">{{ $category->name }}</a></td>
						<td class="text-right"><a href="/admin/categories/delete/{{ $category->id }}"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>

				@endforeach
				</tbody>
			</table>
		</form>
	</div>

@stop