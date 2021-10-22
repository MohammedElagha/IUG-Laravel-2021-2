@extends('layouts.main')
				
				@section('heading')
				<h1>Add Owner</h1>
				@stop

		
		@section('content_body')
		<div class="row">
			<div class="col-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Phone</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($owners as $owner)
							<tr>
								<td>{{ $owner->name }}</td>
								<td>{{ $owner->phone }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		@stop