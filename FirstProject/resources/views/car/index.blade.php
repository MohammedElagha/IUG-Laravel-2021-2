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
							<th></th>
							<th>Brand</th>
							<th>Model</th>
							<th>Owner</th>
							<th>actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($cars as $car)
							<tr>
								<td><img width="100px" src="{{ env('STORAGE_URL') . '/' . $car->image }}"></td>
								<td>{{ $car->brand }}</td>
								<td>{{ $car->model }}</td>
								<td>{{ $car->owner_name }}</td>
								<td>
									<a href="{{ URL('car/' . $car->id . '/edit') }}" class="btn btn-success">EDIT</a> 

									@if ($car->deleted_at == null)
									<form action="{{ URL('car/delete/' . $car->id) }}" method="POST">
										@csrf
										@method('DELETE')

										<button type="submit" class="btn btn-danger">delete</button>
									</form>
									@else
									<form action="{{ URL('car/restore/' . $car->id) }}" method="POST">
										@csrf
										@method('DELETE')

										<button type="submit" class="btn btn-info">restore</button>
									</form>
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				{{ $cars->links() }}
			</div>
		</div>

		@stop