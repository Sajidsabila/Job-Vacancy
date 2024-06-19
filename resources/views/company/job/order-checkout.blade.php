@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <div class="card">
        <div class="card-header">Tagihan</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Nama Perusahaan</label>
                        <input type="text" value="{{ $job->company->company_name }}"
                            class="form-control @error('email') is-invalid @enderror" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Pekerjaan</label>
                        <input type="text" value="{{ $order->job->title }}"
                            class="form-control @error('email') is-invalid @enderror" readonly>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="name">Jumlah Tagihan</label>
                        <input type="text" value="{{ number_format($order->price) }}"
                            class="form-control @error('email') is-invalid @enderror" readonly>
                    </div>
                </div>
                <button class="btn btn-success m-2" id="pay-button">Bayar</button>
                <a href="{{ URL::to('/companie/lowongan-kerja') }}" class="btn btn-warning m-2">Kembali</a>
            </div>
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
