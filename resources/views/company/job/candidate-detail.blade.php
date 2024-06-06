@extends ('adminTemplate.layouts.main')

@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Deskripsi Pelamar</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">{!! $jobseeker->description !!}</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card m-2">
                <div class="card-header bg-primary text-white">
                    <ul class="nav nav-pills card-header-pills d-flex">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Data Diri</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">First Name</label>
                        <div>{{ $jobseeker->first_name . ' ' . $jobseeker->last_name }}</div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Lahir</label>
                        <div>{{ $jobseeker->birth_date }}</div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Nik</label>
                        <div>{{ $jobseeker->nik }}</div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Jenis Kelamin</label>
                        <div>{{ $jobseeker->gender }}</div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Agama</label>
                        <div>{{ $jobseeker->religion->religion }}</div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">No Handphone</label>
                        <div>{{ $jobseeker->phone }}</div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Alamat Tempat Tinggal</label>
                        <div>{{ $jobseeker->address }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="col-6">
                <div class="card m-2">
                    <div class="card-header bg-primary text-white">Kemampuan</div>

                    <div class="form-group ml-3">

                        <ul class="list-group  m-3">
                            @foreach ($skill as $skill)
                                <li class="list-group-item">{{ $skill->skill }}
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Riwayat Pendidikan Pelamar</div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
