@extends('layouts.main')
				
				@section('heading')
				<h1>Add Car</h1>
				@stop

		
		@section('content_body')

		<div class="row">
			@foreach ($errors->all() as $msg)
				<div class="col-12">
					<div class="alert alert-danger">{{ $msg }}</div>
				</div>
			@endforeach

			@if (session()->has('status'))
				@if (session('status'))
					<div class="col-12">
						<div class="alert alert-success">SUCCESS</div>
					</div>
				@else
					<div class="col-12">
						<div class="alert alert-danger">FAILED</div>
					</div>
				@endif
			@endif
		</div>

		<div class="row">
			<div class="col-12">
				<form method="POST" action="{{ URL('car/store') }}" enctype="multipart/form-data">
					@csrf
					
					<div class="form-group">
						<label>Brand</label>
						<input type="text" name="brand" class="form-control">
					</div>

					<div class="form-group">
						<label>Model</label>
						<input type="text" name="model" class="form-control">
					</div>

					<div class="form-group">
						<label>Owner</label>
						<select name="owner_id" class="form-control">
							@foreach ($owners as $owner)
								<option value="{{ $owner->id }}">{{ $owner->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>image</label>
						<input type="file" name="image" class="form-control">
					</div>

					<button class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>

		@stop