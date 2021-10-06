@extends('layouts.main')
	
				@section('heading')
				<h1>View Courses</h1>
				<h1>{{ $id }}</h1>
				@stop

		@section('content_body')
		<div class="row">
			<div class="col-12">
				<table class="table table-bordered table-hover">
					<tbody>
						@foreach ($courses as $course)
							<tr>
								<td>{{ $course['id'] }}</td>
								<td>{{ $course['name'] }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		@stop
