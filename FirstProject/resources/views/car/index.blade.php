@extends('layouts.main')
				
				@section('heading')
				<h1>@lang('dashboard.general.view') @lang('dashboard.car.cars')</h1>
				@stop

		
		@section('content_body')
		<h1>User: {{ $user_name }}</h1>
		<h1>User: {{ session('name') }}</h1>

		<div class="row">
			<div class="col-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th></th>
							<th>@lang('dashboard.car.brand')</th>
							<th>@lang('dashboard.car.model')</th>
							<th>@lang('dashboard.car.owner')</th>
							<th>@lang('dashboard.general.action')</th>
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