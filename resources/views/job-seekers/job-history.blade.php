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
                    <div class="tab-content m-5">
                        <h5>Riwayat Lamaran</h5>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Posisi Yang Dilamar</th>
                                    <th>Perusahaan</th>
                                    <th>Status</th>
                                    <th>Jadwal Wawancara</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobhistories as $key => $jobhistory)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $jobhistory->job->title }}</td>
                                        <td>{{ $jobhistory->job->company->company_name }}</td>
                                        <td>
                                            @if ($jobhistori->status == 'Lamaran Terkrim')
                                                <span class="badge badge-primary">{{ $jobhistori->status }}</span>
                                            @elseif($jobhistori->status == 'Lamaran Dilihat')
                                                <span class="badge badge-info">{{ $jobhistori->status }}</span>
                                            @elseif($jobhistori->status == 'Lamaran Ditolak')
                                                <span class="badge badge-danger">{{ $jobhistori->status }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $jobhistori->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $jobhistory->interview_date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="single-wrap d-flex justify-content-center">
                            {{-- Memastikan $jobs adalah instance dari LengthAwarePaginator atau Paginator --}}

                            {{ $jobhistories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
