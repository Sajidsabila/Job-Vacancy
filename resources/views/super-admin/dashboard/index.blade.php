@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <section class="content">

    @section('breadcrumbs')
        {{ Breadcrumbs::render('admin.dashboard') }}
    @endsection


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $jobSeekerCount }}</h3>
                            <p>Job Seeker</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-6 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $totalCompanies }}</h3>
                            <p>Job Company</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-building"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Job Seeker Chart</div>
                        <div class="card-body" id="jobSeekerChart">
                            {!! $jobSeekerChart->container() !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <hdiv class="card-header"2>Company Chart</hdiv>
                        <div class="card-body" id="companyChart">
                            {!! $companyChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{ $jobSeekerChart->script() }}
    {{ $companyChart->script() }}


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Nama Perusahaan</div>
                <div class="card-body">
                    <div class="row mt-3">
                        @foreach ($configurations as $configuration)
                            <div class="col-6 ms-5">
                                <img src="{{ URL::to('storage/' . $configuration->logo) }}"
                                    alt="{{ $configuration->company_name }}" width="300px">
                            </div>

                            <div class="col-6">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Nama Perusahaan</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ $configuration->company_name }}"
                                            class="form-control @error('email')is-invalid @enderror" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Deskripsi Perusahaan</label>
                                        <textarea class="form-control" readonly>{{ $configuration->description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Email Perusahaan</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ $configuration->email }}"
                                            class="form-control @error('email')is-invalid @enderror" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Nomer Telpon Perusahaan</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ $configuration->phone }}"
                                            class="form-control @error('email')is-invalid @enderror" readonly>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Alamat Perusahaan</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ $configuration->company_addres }}"
                                            class="form-control @error('email')is-invalid @enderror" readonly>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
