@extends('layouts.app')

@section('content')


	<h1>Dashboard</h1>

	<p>Je bent nu ingelogt  {{ auth()->user()->name }}!</p>
   

@endsection