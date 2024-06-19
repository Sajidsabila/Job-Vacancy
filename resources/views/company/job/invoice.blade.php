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
            <a href="{{ URL::to('/companie/lowongan-kerja') }}" class="btn btn-warning m-2">Kembali</a>
        </div>
    </div>
@endsection
