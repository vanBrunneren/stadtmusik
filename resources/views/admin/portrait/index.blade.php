@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>Portrait</h1>
		<div class="row">
			<div class="col-lg-12">
				<div class="form-group">
					<a href="/admin/portrait/create"><button type="button" class="btn btn-primary">Neuer Eintrag erfassen</button></a>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>
								Reihenfolge
							</th>
							<th>
								Titel
							</th>
							<th>
								Name
							</th>
							<th>
								Kurzbeschreibung
							</th>
							<th>

							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($portrait as $port)
							<tr>
								<td>
									@if($order_low->order !== $port->order)
										<a class="menu-link" href="/admin/portrait/orderUp/{{ $port->id }}">
											<i class="fa fa-arrow-up"></i>
										</a>
									@endif
									@if($order_high->order !== $port->order)
										<a class="menu-link" href="/admin/portrait/orderDown/{{ $port->id }}">
											<i class="fa fa-arrow-down"></i>
										</a>
									@endif
								</td>
								<td>
									{{ $port->title }}
								</td>
								<td>
									{{ $port->name }}
								</td>
								<td>
									{{ $port->shortDescription }}
								</td>
								<td class="text-right">
									<a class="menu-link" href="/admin/portrait/edit/{{ $port->id }}">
										<i class="fa fa-pencil"></i>
									</a>
									<a class="menu-link" href="/admin/portrait/delete/{{ $port->id }}">
										<i class="fa fa-times"></i>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@stop