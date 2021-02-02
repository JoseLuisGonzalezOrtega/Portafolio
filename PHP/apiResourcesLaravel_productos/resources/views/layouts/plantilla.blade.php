<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<a href="{{url('/')}}">Home</a>
	<a href="{{url('/productes')}}">Productes</a>
	<a href="{{url('/usuaris')}}">Usuaris</a>
	<a href="{{url('/projectes')}}">Projectes</a>

	@yield('contingut')
</body>
</html>