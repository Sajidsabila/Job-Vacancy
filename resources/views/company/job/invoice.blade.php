@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <div class="card">
        <div class="card-header">Invoice</div>
        <div class="card-body">
            <center>
                <div class="alert alert-success">
                    Pembayaran Berhasil
                </div>
                <h5 class="fw-bold">Jumlah Pembayaran</h5>
                <h5>{{ number_format($order->price) }}</h5>

                <h5>Status Pembayaran</h5>
                <h5 class="fw-bold">{{ $order->status }}</h5>

                <h5>Tanggal Transaksi</h5>
                <h5 class="fw-bold">{{ formatIndonesianDate($order->updated_at) }}</h5>

            </center>
        </div>
    </div>
@endsection
