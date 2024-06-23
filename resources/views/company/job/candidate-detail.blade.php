@extends ('adminTemplate.layouts.main')

@section('container')
    <div class="row">
        <div class="tab-pane fade active show" id="account-general">
            <div class="card-body media align-items-center">
                <img src="{{ asset('storage/' . $jobhistori->jobseeker->photo) }}"
                    alt="{{ $jobhistori->jobseeker->first_name }}" class="d-block ui-w-80" width="200px">
                <div class="media-body ml-4">
                    <div class="font-weight-bold">
                        {{ $jobhistori->jobseeker->first_name . ' ' . $jobhistori->jobseeker->last_name }} <br>
                        {{ $jobhistori->jobseeker->user->email }}
                    </div>
                </div>

            </div>
            <hr class="border-light m-0">
            <a href="{{ URL::to('/companie/generate-cv/' . $jobhistori->job_seeker_id) }}" class="btn btn-primary m-3">Lihat
                CV</a>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">Deskripsi Pelamar</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="font-weight-bold">{!! $jobhistori->jobseeker->description !!}</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-12">
            <div class="col-6">
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
                            <div>{{ $jobhistori->jobseeker->first_name . ' ' . $jobhistori->jobseeker->last_name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Lahir</label>
                            <div>{{ $jobhistori->jobseeker->birth_date }}</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Nik</label>
                            <div>{{ $jobhistori->jobseeker->nik }}</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Kelamin</label>
                            <div>{{ $jobhistori->jobseeker->gender }}</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Agama</label>
                            <div>{{ $jobhistori->jobseeker->religion->religion }}</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">No Handphone</label>
                            <div>{{ $jobhistori->jobseeker->phone }}</div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat Tempat Tinggal</label>
                            <div>{{ $jobhistori->jobseeker->address }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card m-2">
                    <div class="card-header bg-primary">Pengalam Kerja Pelamar</div>
                    <div class="card-body">
                        @foreach ($jobhistori->jobseeker->workExperiences as $workexperience)
                            <ul class="list-group m-3">
                                <li class="list-group-item">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="font-weight-bold">{{ $workexperience->company_name }}</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="txt">
                                            {{ $workexperience->position . ', ' . $workexperience->start_month . ' ' . $workexperience->start_year . ' S/D' }}
                                            @if ($workexperience->ongoing)
                                                Sampai saat ini
                                            @else
                                                {{ $workexperience->end_month && $workexperience->end_year ? $workexperience->end_month . ' ' . $workexperience->end_year : 'N/A' }}
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-12">
            <div class="col-6">
                <div class="card m-2">
                    <div class="card-header bg-primary text-white">
                        <ul class="nav nav-pills card-header-pills d-flex">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Kemampuan Pelamar</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        @foreach ($jobhistori->jobseeker->skill as $skill)
                            <ul class="list-group m-3">
                                <li class="list-group-item">
                                    {{ $skill->skill }}

                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card m-2">
                    <div class="card-header bg-primary text-white">
                        <ul class="nav nav-pills card-header-pills d-flex">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Riwayat Pendidikan Pelamar</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body order-2">
                        @foreach ($jobhistori->jobseeker->education as $education)
                            <ul class="list-group m-3">
                                <li class="list-group-item">
                                    <div class="col-12">
                                        <div class="d-flex">
                                            <div class="font-weight-bold">{{ $education->educationlevel->level }}</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="txt">
                                            {{ $education->school . ', ' . $education->start_month . ' ' . $education->start_year . ' S/D' }}
                                            @if ($education->ongoing)
                                                Sampai saat ini
                                            @else
                                                {{ $education->end_month && $education->end_year ? $education->end_month . ' ' . $education->end_year : 'N/A' }}
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
