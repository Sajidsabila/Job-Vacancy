@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Input Data Lowongan Kerja</div>
                <div class="card-body">
                    @if (isset($job))
                        <form action="{{ URL::to('/companie/lowongan-kerja/' . $job->id) }}" method="post">
                            @method('put')
                        @else
                            <form action="{{ URL::to('/companie/lowongan-kerja/') }}" method="post">
                    @endif
                    @csrf
                    <div class="col-12 d-flex flex-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Kategori Pekerjaan </label>
                                <select name="job_category_id"
                                    class="form-control @error('job_category_id')is-invalid @enderror" name="category_id">
                                    <option value="" disabled>-- Silahkan Pilih Kategori --</option>
                                    @foreach ($jobcategories as $jobcategory)
                                        <option class="form-control" value="{{ $jobcategory->id }}"
                                            {{ isset($company) ? ($company->job_category_id === $jobcategory->id ? 'selected' : '') : '' }}>
                                            {{ $jobcategory->category }}</option>
                                    @endforeach
                                </select>
                                @error('job_category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Pilih Waktu Kerja</label>
                                <select name="job_time_type_id"
                                    class="form-control @error('job_time_type_id')is-invalid @enderror" name="category_id">
                                    @foreach ($jobtimtypes as $jobtimetype)
                                        <option class="form-control" value="{{ $jobtimetype->id }}"
                                            {{ isset($job) ? ($job->job_time_type_id === $jobtimetype->id ? 'selected' : '') : '' }}>
                                            {{ $jobtimetype->type }}</option>
                                    @endforeach
                                </select>
                                @error('job_time_type_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-6 m-2">
                        <div class="form-group">
                            <label>Lowongan Kerja Yang Dibutuhkan</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ isset($job) ? $job->title : old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Lokasi Penempatan</label>
                            <input type="text" class="form-control @error('job_location') is-invalid @enderror"
                                id="job_location" name="job_location"
                                value="{{ isset($job) ? $job->job_location : old('job_location') }}">
                            @error('job_location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gaji yang ditawarkan</label>
                            <input type="text" class="form-control  @error('salary') is-invalid @enderror" id="salary"
                                name="salary" value="{{ isset($job) ? $job->salary : old('job_location') }}">
                            @error('salary')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Requirement</label>
                            <select class="form-control selectpicker" id="requirement_id" name="requirement_id[]" multiple
                                data-style="btn-primary" title="Requirement">
                                @foreach ($requirements as $key => $requirement)
                                    <option value="{{ $requirement->id }}"
                                        {{ in_array($requirement->id, $selectedRequirements) ? 'selected' : '' }}>
                                        {{ $requirement->type }}</option>
                                @endforeach
                            </select>
                            @error('requirement')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Requirement</label>
                            <select class="form-control selectpicker" id="benefit_id" name="benefit_id[]" multiple
                                data-style="btn-primary" title="Requirement">
                                @foreach ($benefits as $key => $benefit)
                                    <option value="{{ $benefit->id }}"
                                        {{ in_array($benefit->id, $selectedBenefits) ? 'selected' : '' }}>
                                        {{ $benefit->benefit }}</option>
                                @endforeach
                            </select>
                            @error('requirement')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Deskripsi Pekerjaan</label>
                            <textarea id="description" name="description" cols="40" rows="30"
                                class="form-control  @error('description')is-invalid @enderror">{{ isset($job) ? $job->description : old('description') }}</textarea>
                            @error('description')
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
