@extends('calendar.index')

@section('title', 'Events: ' . $date)

@section('content')
    <div class="overlay">
        @if ($events->count() > 0)
            <h2 class="title">Events for {{ $date }}</h2>
            <ul>
                @foreach ($events as $event)
                    <li>
                        <strong>{{ $event->name }}</strong>
                        <p>Date: {{ $event->date }}</p>
                        <p>Place: {{ $event->place }}</p>
                        <p>Description: {{ $event->description }}</p>
                        <p>Type: {{ $event->type }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No events for {{ $date }}</p>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

        });
    </script>
@stop
