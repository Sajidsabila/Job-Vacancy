<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Penerimaan Perusahaan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h2 class="card-title">Pengajuan Perusahaan Diterima</h2>
            </div>
            <div class="card-body">
                <p>Halo,</p>
                <p>Kami dengan senang hati menginformasikan bahwa perusahaan Anda,
                    <strong>{{ $company->company_name }}</strong>, telah diterima.
                </p>
                <p>Terima kasih telah mengajukan pendaftaran.</p>
                <p>Salam,</p>
                <p>Tim Kami</p>
            </div>
            <div class="card-footer text-muted">
                <p>&copy; {{ date('Y') }} Perusahaan Kami. Semua hak dilindungi undang-undang.</p>
            </div>
        </div>
    </div>
</body>

</html>
