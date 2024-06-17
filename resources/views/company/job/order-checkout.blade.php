@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <div class="card">
        <div class="card-header">Tagihan</div>
        <div class="card-body">
            <center>

                <h5>Jumlah Tagihan</h5>

                <h5>{{ number_format($order->price) }}</h5>
                <button class="btn btn-success" id="pay-button">Bayar</button>
            </center>
        </div>
    </div>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("Pembayaran Sukses!");
                    const url = '{{ URL::to('/companie/lowongan-kerja/invoice/' . $order->id) }}';
                    window.open(url, '_self');
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("Sedang menunggu pembayaran anda!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("Pembayaran Gagal!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('Anda menutup pop up tanpa melakukan pembayaran');
                }
            })
        });
    </script>
@endsection
