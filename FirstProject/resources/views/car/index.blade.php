@extends('layouts.main')
				
				@section('heading')
				<h1>View Cars</h1>
				@stop

		
		@section('content_body')
		<div class="row">
			<div class="col-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Brand</th>
							<th>Model</th>
							<th>Owner</th>
							<th>actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($cars as $car)
							<tr>
								<td>{{ $car->brand }}</td>
								<td>{{ $car->model }}</td>
								<td>{{ $car->owner_name }}</td>
								<td><a href="{{ URL('car/' . $car->id . '/edit') }}">EDIT</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		@stop