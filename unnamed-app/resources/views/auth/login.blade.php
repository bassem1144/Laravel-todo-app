<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>
</head>

<body>
	<h1>Login</h1>

		@if (session()->has('message'))
            <div>
                {{ session('message') }}
            </div>
        @endif


	<form action="{{ route('login') }}" method="post">
		@csrf
		<label for="email">Email:</label>
		<input type="email" id="email" name="email" required><br><br>
		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br><br>

		@if ($errors->any())
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		@endif

		<input type="submit" value="Login">
	</form>
	<br>
	<a href="{{ route('register') }}">Register</a>
</body>

</html>
