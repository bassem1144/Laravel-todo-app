@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center flex-col">
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

            <div id="email-did-u-mean" class="text-sm mb-3"></div>
            <div id="email-validation-feedback" class="text-sm mb-3"></div>

            <label for="password" class="block text-sm font-medium text-gray-600 mb-2">Password:</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}"
                class="w-full border rounded-md py-2 px-3 mb-3 @error('password') border-red-500 @enderror">

            <ul>
                <li id="characters"></li>
                <li id="uppercase"></li>
                <li id="number"></li>
            </ul>

            @if ($errors->any())
                <ul class="text-red-500 mb-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Register</button>
        </form>

        <script>
            $(document).ready(function() {

                $('#email').on('input', function() {
                    // Get the email value
                    var email = $(this).val();

                    // Perform validation using the API
                    validateEmail(email);
                });

                // Function to perform email validation using the API
                function validateEmail(email) {
                    // Make an API request to validate the email
                    $.ajax({
                        url: 'http://apilayer.net/api/check',
                        method: 'GET',
                        data: {
                            access_key: 'd66cea88907bfc89cb9d6cff3f3689c5',
                            email: email
                        },
                        success: function(response) {

                            console.log(response);
                            // Update the UI based on the API response
                            if (response.did_you_mean) {
                                $('#email-did-u-mean').css('color', 'orange').text(
                                    'Did you mean ' + response.did_you_mean + '?');
                            } else {
                                $('#email-did-u-mean').text('');
                            }

                            if (response.format_valid) {
                                $('#email-validation-feedback').css('color', 'green').text(
                                    '✓ Email is valid');
                            } else {
                                $('#email-validation-feedback').css('color', 'red').text(
                                    '✗ Email is not valid');
                            }
                        },
                        error: function() {
                            // Handle error if the API request fails
                            console.error('Error validating email');
                        }
                    });
                }


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
                        $('#uppercase').css('color', 'green').text(
                            '✓ Must contain at least one uppercase letter');
                    } else {
                        $('#uppercase').css('color', 'red').text(
                            '✗ Must contain at least one uppercase letter');
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
</div>

@endsection
