<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>

<body>
    <p>Halo {{ $user->email }},</p>
    <p>Terima kasih telah mendaftar! Silahkan verifikasi alamat email Anda dengan mengklik tombol di bawah ini:</p>
    <a href="{{ route('verify.email', $user->email_verification_token) }}" target="_blank">Verifikasi Email</a>
    <p>Jika Anda tidak mendaftar, abaikan email ini.</p>
</body>

</html>
