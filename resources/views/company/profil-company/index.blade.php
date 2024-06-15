@extends ('adminTemplate.layouts.main')
@section('container')
{{-- <!-- Small boxes (Stat box) -->
<div class="row justify-content-center">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $job }}</h3>
                <p>Jobs</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $job_histories }}</h3>
                <p>Apply Jobs</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div> --}}
    @include('sweetalert::alert')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            {{-- <h3>{{ $jobCount }}</h3> --}}
                            <h3>{{ $job }}</h3>
                            <p>Jobs</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-briefcase"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <div class="col-lg-6 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            {{-- <h3>{{ $jobHistoryCount }}</h3> --}}
                            <h3>{{ $job_histories }}</h3>
                            <p>Job Histories</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h3> {{ $title }} </h3>
    <hr>
    <div class="row mt-3">
        <div class="col-6 ms-5">
            <img src="{{ URL::to('storage/' . $company->logo) }}" alt="{{ $company->company_name }}" width="300px">
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
                    {!! $company->deskripsi !!}
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
        <a href="{{ URL::to('/companie/company-profile/' . $company->id . '/edit') }}"
            class="btn btn-warning btn-md m-2">Edit</a>

    </div>
@endsection
