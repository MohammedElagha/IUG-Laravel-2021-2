@extends('layouts.main')
				
				@section('heading')
				<h1>Add Owner</h1>
				@stop

		
		@section('content_body')
		<div class="row">
			<div class="col-12">
				<form method="POST" action="{{ URL('owner/store') }}">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control">
					</div>

					<div class="form-group">
						<label>Phone</label>
						<input type="text" name="phone" class="form-control">
					</div>

					<button class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>

		@stop