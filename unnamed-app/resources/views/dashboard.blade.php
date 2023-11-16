<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	@vite('resources/css/app.css')
</head>
<body>
	<h1>Dashboard</h1>

<p>Je bent nu ingelogt  {{ auth()->user()->name }}!</p>
   


</body>
</html>
