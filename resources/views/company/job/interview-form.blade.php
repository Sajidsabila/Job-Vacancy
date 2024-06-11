@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Input Data Lowongan Kerja</div>
                <div class="card-body">
                    <form action="{{ URL::to('/companie/lowongan-kerja/schedule-interview/' . $jobHistory->id) }}"
                        method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="col-6 m-2">
                            <div class="form-group">
                                <label>Input Tanggal Interview</label>
                                <input type="date" class="form-control @error('interview_date') is-invalid @enderror"
                                    id="interview_date" name="interview_date"
                                    value="{{ isset($jobHistory) ? $jobHistory->interview_date : old('interview_date') }}">
                                @error('interview_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
