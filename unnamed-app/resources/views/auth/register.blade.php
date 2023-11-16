<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
</head>

<body>
    <h1>Login</h1>
    <form action="{{ route('register') }}" method="post">
        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}"><br><br>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{old('email')}}" ><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{old('password')}}"><br><br>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif

        <input type="submit" value="Register">
    </form>
</body>

</html>
