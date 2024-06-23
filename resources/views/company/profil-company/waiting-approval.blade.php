@extends('adminTemplate.layouts.main')

@section('container')
    @include('sweetalert::alert')
    <style>
        .approval-card {
            margin-top: 50px;
        }

        .approval-icon {
            font-size: 50px;
            color: #ffc107;
        }

        .card-title {
            font-weight: bold;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card approval-card text-center">
                    <div class="card-body text-center">
                        <div class="approval-icon">
                            <i class="fas fa-clock"></i>
                        </div>

                        <h3 class="fw-bold text-center">Permohonan Anda Sedang Menunggu Persetujuan Admin</h3>

                        <p class="card-text mt-3">


                            Terima kasih telah mengajukan permohonan. Permohonan Anda sedang diproses
                            dan akan segera ditinjau oleh admin. Mohon bersabar menunggu konfirmasi lebih lanjut.
                        </p>
                        {{-- <a href="{{ url('/') }}" class="btn btn-primary mt-4">Kembali ke Halaman Utama</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
