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
                    @foreach ($educations as $key => $education)
                        <ul class="list-group  m-3">
                            <li class="list-group-item">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="font-weight-bold"> {{ $education->educationlevel->level }}</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="txt">
                                        {{ $education->school . ', ' . $education->start_month . '  ' . $education->start_year . ' ' . 'S/D' }}
                                        @if ($education->ongoing)
                                            Sampai saat ini
                                        @else
                                            {{ $education->end_month && $education->end_year ? $education->end_month . ' ' . $education->end_year : 'N/A' }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 d-flex ">
                                    <a href="{{ URL::to('/education-user/' . $education->id . '/edit') }}"
                                        class="btn-btn-edit">Edit</a>
                                    <form action="{{ URL::to('/education-user/' . $education->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-btn-delete ms-2"
                                            onclick="return confirm('apakah Yakin Ingin Menghapus {{ $education->school }}')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>

                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
