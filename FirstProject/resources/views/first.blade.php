<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"> -->

	<!-- <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css"> -->

	<!-- <link rel="stylesheet" type="text/css" href="http://localhost:8000/css/bootstrap.min.css"> -->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

	<style type="text/css">
		h1 {
			color: purple;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
	<h1>Welcome to Laravel</h1>

	<hr>

	<table>
		@foreach ($courses as $key => $course)
			@if ($course['name'] != 'mobile')
				<tr>
					<td>{{$course['id']}}</td>
					<td>{{$course['name']}}</td>
				</tr>
			@endif
		@endforeach
	</table>


</body>

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- <script type="text/javascript" src="../../public/js/bootstrap.min.js"></script> -->

<!-- <script type="text/javascript" src="http://localhost:8000/js/bootstrap.min.js"></script> -->

<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>

<script type="text/javascript">
	console.log("hi");
</script>

</html>