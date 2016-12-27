@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>Navigation</h1>
		<div class="row">
			<div class="col-lg-12">
				<table class="table">
					<thead>
						<tr>
							<th>
								Reihenfolge
							</th>
							<th>
								Name
							</th>
							<th>
								Route
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($navigation as $nav)
							<tr>
								<td>
									@if($order_low->order !== $nav->order)
										<a class="menu-link" href="/admin/navigation/orderUp/{{ $nav->id }}">
											<i class="fa fa-arrow-up"></i>
										</a>
									@endif
									@if($order_high->order !== $nav->order)
										<a class="menu-link" href="/admin/navigation/orderDown/{{ $nav->id }}">
											<i class="fa fa-arrow-down"></i>
										</a>
									@endif
								</td>
								<td>
									{{ $nav->name }}
								</td>
								<td>
									{{ $nav->route }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection