<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Lamaran Masuk</h1>
    <p>Halo,</p>
    <p>Ada lamaran pekerjaan masuk untuk posisi {{ $job->title }}. Berikut Adalah Detail Pelamar :
        <br>
        <br>
        <br>
        <strong>Nama Pelamar : {{ $jobseekerName }}</strong>
        <br>
        <strong>Jenis Kelamain Pelamar: {{ $gender }}</strong>
        <br>
        <strong>Nomer Telepon Pelamar: {{ $phone }}</strong>
        <br>
        <br>
        <br>
        <br>
        Masuk Ke akun anda untuk mengecek pelamar lebih detail
    </p>
    <p>Terima kasih,</p>
</body>

</html>
