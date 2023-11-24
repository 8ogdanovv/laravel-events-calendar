<?php

// function mapMonthToArray($date) {
//     $millisecInDay = 1000 * 60 * 60 * 24;
//     $curYear = $date->format('Y');
//     $curMonth = $date->format('n');
//     $curDate = $date->format('j');
//     $curDay = $date->format('w');

//     $firstMonthDate = new DateTime("$curYear-$curMonth-01");
//     $firstCurMonthWeekDay = $firstMonthDate->format('w');

//     $lastMonthDate = new DateTime("$curYear-$curMonth-" . $firstMonthDate->format('t'));
//     $lastCurMonthWeekDay = $lastMonthDate->format('w');

//     $preTail = [];
//     if ($firstCurMonthWeekDay !== '0') {
//         $dateStamp = strtotime($firstMonthDate->format('Y-m-d'));
//         for ($i = $firstCurMonthWeekDay; $i > 0; $i--) {
//             $date = new DateTime(date('Y-m-d', $dateStamp - $millisecInDay));
//             $dateStamp -= $millisecInDay;
//             $preTail[$date->format('w')] = $date;
//         }
//     }

//     $postTail = [];
//     if ($lastCurMonthWeekDay !== '6') {
//         $dateStamp = strtotime($lastMonthDate->format('Y-m-d'));
//         for ($i = $lastCurMonthWeekDay + 1; $i <= 6; $i++) {
//             $date = new DateTime(date('Y-m-d', $dateStamp + $millisecInDay));
//             $dateStamp += $millisecInDay;
//             $postTail[$date->format('w')] = $date;
//         }
//     }

//     $firstWeekArray = [$preTail, []];

//     $dateStamp = strtotime($firstMonthDate->format('Y-m-d'));
//     for ($i = $firstCurMonthWeekDay; $i <= 6; $i++) {
//         $date = new DateTime(date('Y-m-d', $dateStamp));
//         $firstWeekArray[1][$date->format('w')] = $date;
//         $dateStamp += $millisecInDay;
//     }

//     $lastWeekArray = [[], $postTail];

//     $dateStamp = strtotime($lastMonthDate->format('Y-m-d'));
//     for ($i = $lastCurMonthWeekDay; $i >= 0; $i--) {
//         $date = new DateTime(date('Y-m-d', $dateStamp));
//         $lastWeekArray[0][$date->format('w')] = $date;
//         $dateStamp -= $millisecInDay;
//     }

//     $firstDayOfSecondWeekStamp = isset($firstWeekArray[1][6]) ? strtotime($firstWeekArray[1][6]->format('Y-m-d')) + $millisecInDay : 0;
//     $lastDayOfPreLastWeekStamp = isset($lastWeekArray[0][0]) ? strtotime($lastWeekArray[0][0]->format('Y-m-d')) - $millisecInDay : 0;

//     $daysBetween = $firstDayOfSecondWeekStamp && $lastDayOfPreLastWeekStamp ? round(($lastDayOfPreLastWeekStamp - $firstDayOfSecondWeekStamp) / $millisecInDay) : 0;

//     $middleWeeksCount = $daysBetween ? ($daysBetween + 1) / 7 : 0;
//     $middleWeeks = array_fill(0, $middleWeeksCount, []);

//     $weekIndex = 0;
//     for ($i = $firstDayOfSecondWeekStamp; $i <= $lastDayOfPreLastWeekStamp; $i += $millisecInDay) {
//         $curDayOfWeek = (new DateTime(date('Y-m-d', $i)))->format('w');
//         $middleWeeks[$weekIndex][$curDayOfWeek] = new DateTime(date('Y-m-d', $i));
//         if ($curDayOfWeek === '6') {
//             $weekIndex++;
//         }
//     }

//     $wholeMonth = array_merge($firstWeekArray, $middleWeeks, $lastWeekArray);
//     return $wholeMonth;
// }

// function mapMonthsToCalendar() {
//     $curMonthNum = (new DateTime())->format('n');
//     $datesToMap = [];
//     for ($i = $curMonthNum, $curFullYear = (new DateTime())->format('Y'); count($datesToMap) < 6;) {
//         $curFirst = new DateTime("$curFullYear-$i-01");
//         $datesToMap[] = $curFirst;
//         if ($i === 12) {
//             $i = 1;
//             $curFullYear++;
//         } else {
//             $i++;
//         }
//     }

//     $monthsMap = array_map(function ($m) {
//         return mapMonthToArray($m);
//     }, $datesToMap);

//     return $monthsMap;
// }

// for ($i = 0; $i < 5; $i++) {
//     echo $i;
//     echo "<br>";
// }

// $colors = ['red', 'green', 'blue'];
// foreach ($colors as $color) {
//     echo $color;
//     echo "<br>";
// }

// $i = 0;
// while ($i < 5) {
//     echo $i;
//     $i++;
//     echo "<br>";
// }

// $i = 0;
// do {
//     echo $i;
//     $i++;
//     echo "<br>";
// } while ($i < 5);

// echo date('Y-m-d H:i:s');
// echo "<br>";

// $timestamp = strtotime('2022-01-01');
// echo date('Y-m-d', $timestamp);
// echo "<br>";
// echo is_int($timestamp);
// echo "<br>";

// echo is_object($timestamp);
// echo "<br>";

// $date = date('Y-m-d');
// echo $date;
// echo "<br>";
// $newDate = date('Y-m-d', strtotime($date . ' + 7 days'));
// echo $newDate;
// echo "<br>";

// $start_date = '2022-01-01';
// $end_date = '2022-01-10';

// echo "<hr>";

// $date_range = new DatePeriod(
//     new DateTime($start_date),
//     new DateInterval('P1D'),
//     new DateTime($end_date)
// );

// foreach ($date_range as $date) {
//     echo $date->format('Y-m-d') . '<br>';
// }


