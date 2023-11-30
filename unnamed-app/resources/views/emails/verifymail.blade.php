<!DOCTYPE html>
<html>

<head>
    <title>account verification</title>
</head>

<body>
    <h1>Welkom op onze website, {{ $name }}!</h1>
    <p>klik hieronder om je account te activeren</p>
    <a href="{{ url('/verify', $guid) }}">Klik hier</a>
</body>

</html>
