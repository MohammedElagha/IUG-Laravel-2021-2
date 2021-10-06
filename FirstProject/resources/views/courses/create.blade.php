@extends('layouts.main')
				
				@section('heading')
				<h1>Add Course</h1>
				@stop

		
		@section('content_body')
		<div class="row">
			<div class="col-12">
				<form>
					<div class="form-group">
						<label>ID</label>
						<input type="text" name="id" class="form-control">
					</div>

					<div class="form-group">
						<label>Name</label>
						<input type="text" name="" class="form-control">
					</div>

					<button type="submit" class="btn btn-primary">Add</button>
				</form>
			</div>
		</div>

		<div class="row"></div>
		@stop