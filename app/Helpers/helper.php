<?php

function NumberFormat($number)
{
    return number_format('0', ',', ',');
}
function DateFormat($date, $format = "D-M-Y H:m:s")
{
    return \Carbon\Carbon::parse($date)->isoFormat($format);
}

function formatIndonesianDate($date)
{
    if (is_null($date)) {
        return 'N/A';
    }

    $carbonDate = $date instanceof Carbon ? $date : \Carbon\Carbon::parse($date);

    $days = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
    ];

    $months = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mei',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember',
    ];

    $dayName = $days[$carbonDate->format('l')];
    $day = $carbonDate->format('d');
    $month = $months[$carbonDate->format('F')];
    $year = $carbonDate->format('Y');

    return "{$dayName}, {$day} {$month} {$year}";
}
?>