<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl font-semibold mb-6">Register</h1>

        <form action="{{ route('register') }}" method="post">
            @csrf

            <label for="name" class="block text-sm font-medium text-gray-600 mb-2">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="w-full border rounded-md py-2 px-3 mb-3 @error('name') border-red-500 @enderror">

            <label for="email" class="block text-sm font-medium text-gray-600 mb-2">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full border rounded-md py-2 px-3 mb-3 @error('email') border-red-500 @enderror">

            <label for="password" class="block text-sm font-medium text-gray-600 mb-2">Password:</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}"
                class="w-full border rounded-md py-2 px-3 mb-3 @error('password') border-red-500 @enderror">

            @if ($errors->any())
                <ul class="text-red-500 mb-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Register</button>
        </form>
    </div>

</body>

</html>
