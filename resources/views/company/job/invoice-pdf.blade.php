<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <div class="card">
        <div class="card-header">Invoice</div>
        <div class="card-body">
            <center>
                <div class="alert alert-success">
                    Pembayaran Berhasil
                </div>
                <h5 class="fw-bold"><strong>Jumlah Pembayaran</strong>
                </h5>
                <h5>{{ number_format($order->price) }}</h5>

                <h5><strong>Status Pembayaran</strong></h5>
                <h5 class="fw-bold">{{ $order->status }}</h5>

                <h5><strong>Nama Lowongan</strong></h5>
                <h5 class="fw-bold">{{ $order->job->title }}</h5>

                <h5><strong>Tanggal Transaksi</strong></h5>
                <h5 class="fw-bold">{{ formatIndonesianDate($order->updated_at) }}</h5>

            </center>
        </div>
    </div>
</body>

</html>
