<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Escola</title>

		<!-- Bootstrap CSS -->
		{{HTML::style("packages/bootstrap/css/bootstrap.min.css")}}
		{{HTML::style("packages/bootstrap/css/bootstrap-theme.min.css")}}

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!-- jQuery -->
		{{HTML::script("js/jquery-2.1.1.min.js")}}
		
		<!-- Bootstrap JavaScript -->
		{{HTML::script("packages/bootstrap/js/bootstrap.min.js")}}
	</head>
	<body>
		<div class="col-md-8 col-md-offset-2">
			@include("layouts.menu")
			@yield("content")		
		</div>
	</body>
</html>