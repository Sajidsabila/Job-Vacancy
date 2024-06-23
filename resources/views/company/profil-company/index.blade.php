@extends('adminTemplate.layouts.main')

@section('container')
    @include('sweetalert::alert')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
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

    <h3>{{ $title }}</h3>
    <hr>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Chart Lamaran</div>
                    <div class="card-body">
                        {!! $jobhistory->container() !!}
                    </div>
                </div>
            </div>
            <div class="card w-100">
                <div class="card-header">Profile Company</div>
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ URL::to('storage/' . $company->logo) }}" alt="{{ $company->company_name }}"
                            class="img-fluid" width="200px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="company_name">Nama Perusahaan</label>
                                <input type="text" id="company_name" name="company_name"
                                    value="{{ $company->company_name }}" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="description">Deskripsi Perusahaan</label>
                                <div>{!! $company->deskripsi !!}</div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Perusahaan</label>
                                <input type="email" id="email" name="email" value="{{ $company->email }}"
                                    class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="phone">Nomor Telepon Perusahaan</label>
                                <input type="text" id="phone" name="phone" value="{{ $company->phone }}"
                                    class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat Perusahaan</label>
                                <input type="text" id="address" name="address" value="{{ $company->addres }}"
                                    class="form-control" readonly>
                            </div>

                            <a href="{{ URL::to('/companie/company-profile/' . $company->id . '/edit') }}"
                                class="btn btn-warning btn-md mt-2">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! $jobhistory->script() !!}
@endsection
