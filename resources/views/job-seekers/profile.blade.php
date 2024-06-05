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
                <div class="col-md-7">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="{{ 'storage/' . $jobseeker->photo }}" alt="{{ $jobseeker->first_name }}"
                                    class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <div class="font-weight-bold">
                                        {{ $jobseeker->first_name . ' ' . $jobseeker->last_name }} <br>
                                        {{ $jobseeker->user->email }}
                                    </div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card m-2">
                                <div class="card-header bg-primary text-white">Deskripsi Tentang Diri Anda</div>

                                <div class="form-group ml-3">
                                    <label class="font-weight-bold">{!! $jobseeker->description !!}</label>
                                </div>
                            </div>
                        </div>
                        <div class="card m-2">
                            <div class="card-header bg-primary text-white">
                                <ul class="nav nav-pills card-header-pills d-flex ">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Data Diri</a>
                                    </li>
                                    <li class="nav-item ml-auto">
                                        <a class="nav-link"
                                            href="{{ URL::to('/profile/' . $jobseeker->id . '/edit') }}">Edit Data</a>
                                    </li>
                                </ul>
                            </div>
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
                            </div>
                        </div>

                        <div class="card m-2">
                            <div class="card-header bg-primary text-white">Kemampuan</div>

                            <div class="form-group ml-3">

                                <ul class="list-group  m-3">
                                    @foreach ($skills as $skill)
                                        <li class="list-group-item">{{ $skill->skill }}
                                            <div class="col-12 d-flex mt-3">
                                                <a href="{{ URL::to('/profile/skills/edit/' . $skill->id) }}"
                                                    class="btn-btn-edit">Edit</a>
                                                <form action="{{ URL::to('/profile/skills/delete/' . $skill->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-btn-delete ms-2"
                                                        onclick="return confirm('apakah Yakin Ingin Menghapus {{ $skill->skill }}')">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                                <a href="{{ URL::to('/profile/create') }}" class="btn-add m-4">+ Tambahkan</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
