@extends('public.layout')

@section('content')

	<div class="container-fluid">
		
		<div class="row">
			<div class="col-xs-12">
				<h1 class="site-title">Agenda</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<table class="table table-hover">

					@foreach($categories as $category) 

						<thead>
							<tr>
								<td colspan="4" class="td-no-border">
									<p class="agenda-title">{{ $category->name }}</p>
								</td>
							</tr>
						</thead>

						<tbody>
						<tr>
							<td>
								<p class="agenda-top-row">Datum</p>
							</td>
							<td>
								<p class="agenda-top-row">Zeit</p>
							</td>
							<td>
								<p class="agenda-top-row">Veranstaltung</p>
							</td>
							<td>
								<p class="agenda-top-row">Ort</p>
							</td>
						</tr>

							@foreach($agendas as $agenda)
								@if($agenda->category_id == $category->id)
									<tr>
										<td>
											{{ date('d.m.Y', strtotime($agenda->date)) }}
										</td>
										<td>
											{{ date('H:i', strtotime($agenda->date)) }}
										</td>
										<td>
											{{ $agenda->name }}
										</td>
										<td>
											{{ $agenda->location }}
										</td>
									</tr>
								@endif
							@endforeach

							<tr>
								<td colspan="4" style="height: 30px">
								</td>
							</tr>

						@endforeach

						</tbody>
				</table>
			</div>
		</div>
	</div>

@stop