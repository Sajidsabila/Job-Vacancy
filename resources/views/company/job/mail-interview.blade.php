<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Interview</title>
</head>

<body>
    <h1>Jadwal Interview</h1>
    <p>Halo, <strong> {{ $jobSeekerName }}</strong></p>
    <p>Anda telah dijadwalkan di <strong>{{ $companyName }}</strong> untuk interview pada posisi
        <strong>{{ $jobTitle }}</strong>.</p>
    <p>Tanggal interview: <strong>{{ $interviewDate }}</strong></p>
    <p>Jam : <strong>{{ $interviewTime }}</strong></p>
    <p>Tempat : <strong>{{ $interviewLocation }}</strong><strong></strong></p>
    <p>Terima kasih.</p>
</body>

</html>
