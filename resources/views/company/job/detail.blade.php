@extends ('adminTemplate.layouts.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Posisi</label>
                            <input type="text" value="{{ $job->title }}" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Kategori Pekerjaan</label>
                            <input type="text" value="{{ optional($job->jobCategory)->category }}" class="form-control"
                                disabled>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Posisi</label>
                            <input type="text" value="{{ $job->title }}" class="form-control" disabled>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Gaji</label>
                            <input type="text" value="{{ number_format($job->salary) }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row m-3">
                    <table id="datatable2" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kandidat</th>
                                <th>File Lamaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobhistoris as $key => $jobhistori)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $jobhistori->jobseeker->first_name }} {{ $jobhistori->jobseeker->last_name }}
                                    </td>
                                    <td><a href="{{ URL::to('/companie/lowongan-kerja/view-pdf/' . $jobhistori->id) }}">Lihat
                                            Lamaran</a></td>
                                    <td>
                                        @if ($jobhistori->status == 'Lamaran Terkrim')
                                            <span class="badge badge-primary">{{ $jobhistori->status }}</span>
                                        @elseif($jobhistori->status == 'Lamaran Dilihat')
                                            <span class="badge badge-info">{{ $jobhistori->status }}</span>
                                        @elseif($jobhistori->status == 'Lamaran Ditolak')
                                            <span class="badge badge-danger">{{ $jobhistori->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ URL::to('/companie/lowongan-kerja/detail_candidate/' . $jobhistori->id) }}"
                                                class="mr-2 btn btn-info btn-sm">Lihat Pelamar</a>
                                            @if ($jobhistori->status == 'Lamaran Dilihat')
                                                <a href="{{ URL::to('/companie/lowongan-kerja/set-interview/' . $jobhistori->id) }}"
                                                    class="mr-2 btn btn-warning btn-sm">Interview</a>
                                            @endif

                                            @if (!is_null($jobhistori->interview_date))
                                                <a href="{{ URL::to('/companie/lowongan-kerja/reject/' . $jobhistori->id) }}"
                                                    class="mr-2 btn btn-danger btn-sm">Tolak Lamaran</a>
                                                <a href="{{ URL::to('/companie/lowongan-kerja/terima_lamaran/' . $jobhistori->id) }}"
                                                    class="mr-2 btn btn-success btn-sm">Terima Lamaran</a>
                                            @endif
                                        </div>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
