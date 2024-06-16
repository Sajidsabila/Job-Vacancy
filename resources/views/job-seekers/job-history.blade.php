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
                        <h5 class="my-3">Riwayat Lamaran</h5>

                        <!-- Cards -->
                        <div class="row mb-4">
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center job-history-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Jumlah Semua Lamaran</h5>
                                        <p class="card-text display-4">{{ $historycount }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center job-history-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Lamaran Dilihat</h5>
                                        <p class="card-text display-4">{{ $countviewed }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center job-history-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Lamaran Ditolak</h5>
                                        <p class="card-text display-4">{{ $countreject }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center job-history-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Proses Interview</h5>
                                        <p class="card-text display-4">{{ $countinterview }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <div class="text-center job-history-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Lamaran Diterima</h5>
                                        <p class="card-text display-4">{{ $countaccept }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tabel Riwayat Lamaran -->
                        <div class="card">
                            <div class="table-responsive">
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
                                                    @if ($jobhistory->status == 'Lamaran Terkirim')
                                                        <span class="badge badge-primary">{{ $jobhistory->status }}</span>
                                                    @elseif($jobhistory->status == 'Lamaran Dilihat')
                                                        <span class="badge badge-info">{{ $jobhistory->status }}</span>
                                                    @elseif($jobhistory->status == 'Lamaran Ditolak')
                                                        <span class="badge badge-danger">{{ $jobhistory->status }}</span>
                                                    @else
                                                        <span class="badge badge-success">{{ $jobhistory->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (!is_null($jobhistory->interview_date))
                                                        {{ formatIndonesianDate($jobhistory->interview_date) }}
                                                    @else
                                                        Anda Belum Dapat Jadwal Interview
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
