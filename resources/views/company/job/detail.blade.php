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
                            <label>Posisi</label>
                            <input type="text" value="{{ $job->title }}" class="form-control" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
