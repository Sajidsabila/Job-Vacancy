@extends('landing-page.layouts.main')
@section('content')
    @include('sweetalert::alert')
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Account settings</h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        @include('job-seekers.navbar-profile')
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="{{ 'storage/' . $jobseeker->photo }}" alt="{{ $jobseeker->first_name }}"
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">

                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="font-weight-bold">First Name</label>
                                    <div class="">{{ $jobseeker->first_name . ' ' . $jobseeker->last_name }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tanggal Lahir</label>
                                    <div class="">{{ $jobseeker->birth_date }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Nik</label>
                                    <div class="">{{ $jobseeker->nik }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Jenis Kelamin</label>
                                    <div class="">{{ $jobseeker->gender }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Agama</label>
                                    <div class="">{{ $jobseeker->religion->religion }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">No Handphone</label>
                                    <div class="">{{ $jobseeker->phone }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Alamat Tempat Tinggal</label>
                                    <div class="">{{ $jobseeker->address }}</div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Tentang Diri Anda</label>
                                    <div class="">{!! $jobseeker->description !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left m-4">
                        <a href="{{ URL::to('/profile/' . $jobseeker->id . '/edit') }}" class="btn btn-warning">
                            Update Data
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
