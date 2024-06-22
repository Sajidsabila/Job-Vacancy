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
    <style>
        .rejection-card {
            margin-top: 50px;
        }

        .rejection-icon {
            font-size: 50px;
            color: #dc3545;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card rejection-card text-center">
                    <div class="card-body">
                        <div class="rejection-icon">
                            <i class="fas fa-times-circle"></i>
                        </div>

                        <h3 class="fw-bold text-center">Permohonan Anda Ditolak</h3>
                        <p class="card-text mt-3">Kami menyesal menginformasikan bahwa permohonan Anda telah ditolak.
                            Terima kasih telah mengajukan permohonan. Kami menghargai minat Anda dan mendorong Anda
                            untuk mendaftar kembali di masa mendatang. Jika Ingin Mengajukan Kembali Klik Tombol Ajukan
                            Ulang</p>
                        <a href="{{ URL::to('/companie/send-submission') }}" class="btn btn-primary mt-4">Ajukan Ulang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
