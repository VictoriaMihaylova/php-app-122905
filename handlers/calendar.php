<?php
    $months = [
        1 => 'януари', 'февруари', 'март', 'април', 'май', 'юни',
        'юли', 'август', 'септември', 'октомври', 'ноември', 'декември'
    ];

    $month = isset($_GET['month']) ? (int)$_GET['month'] : date('n');
    $year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');

    if ($month < 1 || $month > 12 || $year < 1) {
        $month = date('n'); 
        $year = date('Y'); 
    }

    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $firstDayOfWeek = date('N', strtotime("$year-$month-01"));
    $currentDay = date('Y-m-d');

    $prevMonth = $month - 1;
    $prevYear = $year;
    if ($prevMonth < 1) {
        $prevMonth = 12;
        $prevYear--;
    }

    $nextMonth = $month + 1;
    $nextYear = $year;
    if ($nextMonth > 12) {
        $nextMonth = 1;
        $nextYear++;
    }

    $calendar = '<div class="calendar-header">
                <button onclick="loadCalendar(' . ($month - 1 > 0 ? $month - 1 : 12) . ', ' . ($month - 1 > 0 ? $year : $year - 1) . ')">&lt;</button>
                <h5 class="fw-bold">' . $months[$month] . ' ' . $year . '</h5>
                <button onclick="loadCalendar(' . ($month + 1 <= 12 ? $month + 1 : 1) . ', ' . ($month + 1 <= 12 ? $year : $year + 1) . ')">&gt;</button>
            </div>';
    $calendar .= '<div class="calendar-grid">';

    $daysOfWeek = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Нд'];
    foreach ($daysOfWeek as $day) {
        $style = 'font-weight: bold; pointer-events: none;';
    
        if ($day == 'Сб' || $day == 'Нд') {
            $style .= ' color: #e95b52;';
        }
    
        $calendar .= '<div class="day" style="' . $style . '">' . $day . '</div>';
    }

    for ($i = 1; $i < $firstDayOfWeek; $i++) {
        $calendar .= '<div class="day inactive" style="pointer-events: none;"></div>';
    }
    
    for ($day = 1; $day <= $daysInMonth; $day++) {
        $date = "$year-$month-" . str_pad($day, 2, '0', STR_PAD_LEFT);
        $class = 'day';
    
        if ($date == $currentDay) {
            $class .= ' today';
        }
    
        $calendar .= '<div class="' . $class . '" data-date="' . $date . '">' . $day . '</div>';
    }

    $calendar .= '</div>';

    echo $calendar;
?>