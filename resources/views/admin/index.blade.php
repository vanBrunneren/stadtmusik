@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1 class="dashboard-title">Dashboard</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<a class="dashboard-link" href="/admin/navigation/index">
					<div class="admin-home-button">
						<span class="glyphicon glyphicon-link dashboard-icon"></span>
						Navigation
					</div>
				</a>
			</div>
			<div class="col-xs-4">
				<a class="dashboard-link" href="/admin/home/index">
					<div class="admin-home-button">
						<span class="glyphicon glyphicon-home dashboard-icon"></span>
						Home
					</div>
				</a>
			</div>
			<div class="col-xs-4">
				<a class="dashboard-link" href="/admin/celebration/index">
					<div class="admin-home-button">
						<span class="glyphicon glyphicon-gift dashboard-icon"></span>
						Jubiläum
					</div>
				</a>
			</div>
			<div class="col-xs-4">
				<a class="dashboard-link" href="/admin/agenda/index">
					<div class="admin-home-button">
						<span class="glyphicon glyphicon-calendar dashboard-icon"></span>
						Agenda
					</div>
				</a>
			</div>
			<div class="col-xs-4">
				<a class="dashboard-link" href="/admin/portrait/index">
					<div class="admin-home-button">
						<span class="glyphicon glyphicon-info-sign dashboard-icon"></span>
						Portrait
					</div>
				</a>
			</div>
		</div>
	</div>

@endsection