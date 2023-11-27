@extends('layouts.index')

@section('title', 'Calendar')

@section('content')
    <style>
        /* Add your styles here */
        .months-container {
            display: flex;
            flex-wrap: wrap;
            font-size: 1rem;
            font-weight: 300;
            line-height: 2.5rem;
        }

        .month {
            border: 1px solid var(--pink-a);
            width: 33%;

            display: inline-flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;

            padding: 0 0 1.5rem;
        }

        .month-title {
            font-size: 2rem;
            font-weight: 200;
            align-self: flex-start;
            margin: 0 0 1.5rem;
        }

        .day-names {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            height: 2rem;
            width: 100%;
        }

        .day-names span {
            width: auto;
            flex-grow: 1;
            flex-shrink: 0;
            text-align: center;
            font-size: 1rem;
            line-height: 2rem;
        }

        .dates {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
        }

        .dates span {
            flex-grow: 1;
            flex-shrink: 0;
            width: auto;
            text-align: center;
            font-size: 1rem;
            font-weight: 300;
            line-height: 250%;
            cursor: pointer;

            position: relative;
        }

        .other-month {
            color: #888;
        }

        .dot-container {
            width: 100%;
            position: absolute;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2px;
        }

        .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .pink-dot {
            background-color: var(--pink);
        }

        .green-dot {
            background-color: var(--green);
        }

        .gold-dot {
            background-color: var(--gold);
        }

        .blue-dot {
            background-color: var(--blue);
        }
    </style>

    <h2 class="title">
        Calendar
    </h2>
    {{-- <a href="/calendar/edit">Edit</a> --}}

    <div class="months-container">
        @php
            // Get the current date
            $currentDate = new DateTime();

            // Display six months starting from the current month
            for ($i = 0; $i < 6; $i++) {
                // Copy the current date for iteration
                $iterationDate = clone $currentDate;

                // Output the month container
                echo "<div class='month'>";
                echo "<h3 class='month-title'>" . $iterationDate->format('F Y') . "</h3>";

                // Output day names
                echo "<div class='day-names'>";
                $dayNames = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                foreach ($dayNames as $dayName) {
                    echo "<span>{$dayName}</span>";
                }
                echo "</div>";

                // Calculate the starting and ending days
                $iterationDate->modify('first day of this month');
                $startDay = clone $iterationDate;
                $startDay->modify('last sunday');

                $iterationDate->modify('last day of this month');
                $endDay = clone $iterationDate;
                $endDay->modify('next sunday');

                // Output the days in a grid
                echo "<div class='dates'>";

                $period = new DatePeriod($startDay, new DateInterval('P1D'), $endDay);

                foreach ($period as $day) {
                    // Check if the day is in the current month
                    $inCurrentMonth = $day->format('n') == $iterationDate->format('n');

                    // Add a class for styling the days from the previous and next months
                    $dayClass = $inCurrentMonth ? 'date-day' : 'date-day other-month';

                    // Fetch events for this date
                    $eventsForDate = $events->where('date', $day->format('Y-m-d'));

                    // Convert events to a JSON string
                    $eventsJson = json_encode($eventsForDate);

                    // Determine the event types for the dots
                    $dotClasses = [
                        'meeting' => 'pink-dot',
                        'qna' => 'green-dot',
                        'conf' => 'gold-dot',
                        'webinar' => 'blue-dot',
                    ];

                    // Generate dot elements based on event types
                    $dotsHtml = '';
                    foreach ($dotClasses as $eventType => $dotClass) {
                        if ($eventsForDate->where('type', $eventType)->isNotEmpty()) {
                            $dotsHtml .= "<div class='dot {$dotClass}'></div>";
                        }
                    }

                    // Render the date element with dots
                    echo "<span class='{$dayClass}' data-date='{$day->format('Y-m-d')}' data-events='{$eventsJson}'>";
                    echo "{$day->format('j')}";
                    echo "<div class='dot-container'>{$dotsHtml}</div>";
                    echo "</span>";
                }

                echo "</div>";
                echo "</div>";

                // Move to the next month
                $currentDate->modify('next month');
            }
        @endphp
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const days = document.querySelectorAll('.date-day');

            for (const day of days) {
                day.addEventListener('click', function (e) {
                    const date = e.target.getAttribute('data-date');

                    // const eventsJson = e.target.getAttribute('data-events');
                    // // Parse the JSON string to get the events array
                    // const events = JSON.parse(eventsJson);

                    window.location = `/calendar/${date}`
                });
            }
        });
    </script>
@stop
