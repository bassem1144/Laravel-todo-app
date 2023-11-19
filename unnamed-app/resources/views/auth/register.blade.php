<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    @vite('resources/css/app.css')
    <!-- Include the jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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

            <p>Password Criteria:</p>
            <ul>
                <li id="characters"></li>
                <li id="uppercase"></li>
                <li id="number"></li>
            </ul>

            <div id="password-strength-feedback" class="text-sm mb-3"></div>

            @if ($errors->any())
                <ul class="text-red-500 mb-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600"
                disabled>Register</button>
        </form>

        <script>
            $(document).ready(function() {
                // Add event listener to password field for real-time validation
                $('#password').on('input', function() {
                    // Get the password value
                    var password = $(this).val();

					
                    // Perform validation
                    if (password.length > 5) {
                        $('#characters').css('color', 'green').text('✓ Must be at least 5 characters');
					} else {
						$('#characters').css('color', 'red').text('✗ Must be at least 5 characters');
					}

					if (password.match(/[A-Z]/)) {
						$('#uppercase').css('color', 'green').text('✓ Must contain at least one uppercase letter');
					} else {
						$('#uppercase').css('color', 'red').text('✗ Must contain at least one uppercase letter');
					}

					if (password.match(/[0-9]/)) {
						$('#number').css('color', 'green').text('✓ Must contain at least one number');
					} else {
						$('#number').css('color', 'red').text('✗ Must contain at least one number');
					}

                });
            });
        </script>
    </div>

</body>

</html>
