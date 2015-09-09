<html>
	<head>
		<title>
			
			@yield('title')

		</title>
	</head>
	<body>
		<!-- Bootstrap CDN -->
		{!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') !!}
		
		<!-- Yield Content -->
		@yield('content')
		
	</body>
</html>