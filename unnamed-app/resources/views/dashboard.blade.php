<!-- resources/views/fixtures.blade.php -->

@extends('layouts.app') {{-- Assuming you have a layout file --}}

@section('content')
    <h1>Football Fixtures</h1>

    @foreach ($fixtures['response'] as $fixture)
        <div>
            <h2>{{ $fixture['league']['name'] }}</h2>
            <p>Match Date: {{ $fixture['fixture']['date'] }}</p>
            <p>Venue: {{ $fixture['fixture']['venue']['name'] }}, {{ $fixture['fixture']['venue']['city'] }}</p>
            <p>Status: {{ $fixture['fixture']['status']['long'] }} ({{ $fixture['fixture']['status']['short'] }})</p>

            <h3>Teams</h3>
            <p>Home: {{ $fixture['teams']['home']['name'] }}</p>
            <p>Away: {{ $fixture['teams']['away']['name'] }}</p>

            <h3>Score</h3>
            <p>Halftime: {{ $fixture['score']['halftime']['home'] }} - {{ $fixture['score']['halftime']['away'] }}</p>

            <h3>Events</h3>
            @foreach ($fixture['events'] as $event)
                <p>{{ $event['time']['elapsed'] }}' - {{ $event['team']['name'] }}: {{ $event['type'] }} - {{ $event['detail'] }}</p>
            @endforeach
        </div>
        <hr>
    @endforeach
@endsection
