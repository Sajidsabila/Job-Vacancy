@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    <h3> {{ $title }} </h3>
    <hr>
    <div class="row mt-3">
        <div class="col-6 ms-5">
            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->company_name }}" width="300px">
        </div>

        <div class="col-6">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nama Perusahaan</label>
                    <input type="email" id="email" name="email" value="{{ $company->company_name }}"
                        class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name">Deskripsi Perusahaan</label>
                    <textarea class="form-control" readonly>{{ $company->deskripsi }}</textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name">Email Perusahaan</label>
                    <input type="email" id="email" name="email" value="{{ $company->email }}"
                        class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nomer Telpon Perusahaan</label>
                    <input type="email" id="email" name="email" value="{{ $company->phone }}"
                        class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name">Alamat Perusahaan</label>
                    <input type="email" id="email" name="email" value="{{ $company->addres }}"
                        class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
            </div>

        </div>


    </div>
    <div class="col-4">
        <div class="small-box bg-info">
            <div class="inner">
                {{-- <h3>{{ $jobCount }}</h3> --}}
                <h3>{{ $countjob }}</h3>
                <p>Jumlah Lowongan</p>
            </div>
            <div class="icon">
                <i class="ion ion-briefcase"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <table class="table table-striped" id="datatable1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lowongan</th>
                <th>Gaji</th>
                <th>Kategori Pekerjaan</th>
                <th>Jenis Waktu Pekerjaa</th>
                <th>Job Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $key => $job)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ number_format($job->salary) }}</td>
                    <td>
                        {{ optional($job->jobCategory)->category }}
                    </td>
                    <td>{{ optional($job->jobTime)->type }}</td>
                    <td>{{ $job->job_location }}</td>
            @endforeach
            </tr>
        </tbody>
    </table>
@endsection
