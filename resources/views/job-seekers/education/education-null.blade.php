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
                    <div class="text-right mt-3">
                        <a href="{{ URL::to('/education-user/create') }}" class="btn-add m-3">+ Tambahkan</a>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center my-5">
                        <div class="alert alert-warning text-center" role="alert">
                            Data Pendidikan Masih Kosong !
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
