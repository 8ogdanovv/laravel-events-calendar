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
            flex-shrink: 0; /* Add this line to prevent shrinking */
            width: auto;
            text-align: center;
            font-size: 1rem;
            font-weight: 300;
            line-height: 250%;
            cursor: pointer;
        }

        .other-month {
            color: #888;
        }
    </style>

    <h2 class="title">
        Calendar
    </h2>
    <a href="/calendar/edit">Edit</a>

    <div class="months-container">
        @php
            // Get the current month and year
            $currentMonth = date('n');
            $currentYear = date('Y');

            // Display six months starting from the current month
            for ($i = 0; $i < 6; $i++) {
                // Calculate the month and year for each iteration
                $displayMonth = ($currentMonth + $i) % 12;
                $displayYear = $currentYear + floor(($currentMonth + $i - 1) / 12);

                // Set December to the current year if it's the last iteration
                if ($i == 5 && $displayMonth == 12) {
                    $displayYear = $currentYear;
                }

                // Output the month container
                echo "<div class='month'>";
                echo "<h3 class='month-title'>" . date('F Y', mktime(0, 0, 0, $displayMonth, 1, $displayYear)) . "</h3>";

                // Output day names
                echo "<div class='day-names'>";
                $dayNames = ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'];
                foreach ($dayNames as $dayName) {
                    echo "<span>{$dayName}</span>";
                }
                echo "</div>";

                // Calculate the starting and ending days
                $firstDayOfMonth = new DateTime("{$displayYear}-{$displayMonth}-01");
                $startDay = $firstDayOfMonth->format('N'); // Numeric representation of the day of the week (1 for Monday through 7 for Sunday)
                $startDay = $firstDayOfMonth->modify("-{$startDay} days");

                $lastDayOfMonth = new DateTime("{$displayYear}-{$displayMonth}-" . $firstDayOfMonth->format('t'));
                $endDay = $lastDayOfMonth->format('N'); // Numeric representation of the day of the week (1 for Monday through 7 for Sunday)
                $endDay = $lastDayOfMonth->modify("+{$endDay} days");

                // Output the days in a grid
                echo "<div class='dates'>";

                $period = new DatePeriod($startDay, new DateInterval('P1D'), $endDay);

                foreach ($period as $day) {
                    // Check if the day is in the current month
                    $inCurrentMonth = $day->format('n') == $displayMonth;

                    // Add a class for styling the days from the previous and next months
                    $dayClass = $inCurrentMonth ? 'date-day' : 'date-day other-month';

                    echo "<span class='{$dayClass}' data-date='{$day->format('Y-m-d')}'>{$day->format('j')}</span>";
                }

                echo "</div>";
                echo "</div>";
            }
        @endphp
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const days = document.querySelectorAll('.date-day');

            for (const day of days) {
                day.addEventListener('click', function (e) {
                    alert(e.target.getAttribute('data-date'));
                })
            }
        });
    </script>
@stop
