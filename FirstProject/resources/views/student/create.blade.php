@extends('layouts.main')
				
				@section('heading')
				<h1>Add Course</h1>
				@stop

		
		@section('content_body')
		<div class="row">
			<div class="col-12">
				<form method="POST" action="{{ URL('student/store/' . $p) . '?lang=ar&timezone=GMT+3' }}">
					@csrf 

					<div class="form-group">
						<label>ID</label>
						<input type="text" name="id" class="form-control">
					</div>

					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control">
					</div>

					<div class="form-group">
						<label>Nationality</label>
						<select name="nationality" class="form-control">
							@foreach ($nationalities as $key => $value)
								<option value="{{ $key }}">{{ $value }}</option>
							@endforeach
						</select>
					</div>

					<button type="submit">Add</button>
				</form>
			</div>
		</div>

		<div class="row"></div>
		@stop