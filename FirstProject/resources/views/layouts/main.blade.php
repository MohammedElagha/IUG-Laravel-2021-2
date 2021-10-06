
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	@include('includes.appCSS')

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-12">
				@yield('heading')
			</div>
		</div>

		@yield('content_body')

		</div>

	

</body>
</html>
