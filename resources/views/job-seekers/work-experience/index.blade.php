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
                        <a href="{{ URL::to('/work-experince/create') }}" class="btn-add m-3">+ Tambahkan</a>
                    </div>
                    @foreach ($workexperiences as $key => $workexperience)
                        <ul class="list-group  m-3">
                            <li class="list-group-item">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="font-weight-bold"> {{ $workexperience->company_name }}</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="txt">
                                        {{ $workexperience->position . ', ' . $workexperience->start_month . '  ' . $workexperience->start_year . ' ' . 'S/D' }}
                                        @if ($workexperience->ongoing)
                                            Sampai saat ini
                                        @else
                                            {{ $workexperience->end_month && $workexperience->end_year ? $workexperience->end_month . ' ' . $workexperience->end_year : 'N/A' }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 d-flex ">
                                    <a href="{{ URL::to('/work-experince' . $workexperience->id . '/edit') }}"
                                        class="btn-btn-edit">Edit</a>
                                    <form action="{{ URL::to('/work-experince' . $workexperience->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn-btn-delete ms-2"
                                            onclick="return confirm('apakah Yakin Ingin Menghapus {{ $workexperience->school }}')">
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
