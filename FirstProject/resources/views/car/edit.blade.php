@extends('layouts.main')
				
				@section('heading')
				<h1>Edit Car</h1>
				@stop

		
		@section('content_body')
		<div class="row">
			<div class="col-12">
				<form method="POST" action="{{ URL('car/update/' . $car->id) }}">
					@csrf
					@method('PUT')

					<div class="form-group">
						<label>Brand</label>
						<input type="text" name="brand" class="form-control" value="{{ $car->brand }}">
					</div>

					<div class="form-group">
						<label>Model</label>
						<input type="text" name="model" class="form-control" value="{{ $car->model }}">
					</div>

					<div class="form-group">
						<label>Owner</label>
						<select name="owner_id" class="form-control">
							@foreach ($owners as $owner)
								@if ($owner->id = $car->owner_id)
									<option value="{{ $owner->id }}" selected>{{ $owner->name }}</option>
								@else
									<option value="{{ $owner->id }}">{{ $owner->name }}</option>
								@endif
							@endforeach
						</select>
					</div>

					<button class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>

		@stop