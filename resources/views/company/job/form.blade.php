@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Input Data Lowongan Kerja</div>
                <div class="card-body">
                    @if (isset($job))
                        <form action="{{ URL::to('/companie/lowongan-kerja/') }}" method="post">
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
                                            {{ isset($companyu) ? ($company->category_id === $jobtimetypey->id ? 'selected' : '') : '' }}>
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
                                name="title" value="{{ isset($company) ? $company->title : old('title') }}">
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
                                value="{{ isset($company) ? $company->job_location : old('job_location') }}">
                            @error('job_location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Gaji yang ditawarkan</label>
                            <input type="text" class="form-control  @error('salary') is-invalid @enderror"
                                id="requirements" name="requirement[]" multiple="multiple" value="{{ old('salary') }}">
                            @error('salary')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="name">Deskripsi Pekerjaan</label>
                            <textarea id="description" name="description" cols="40" rows="30"
                                class="form-control  @error('description')is-invalid @enderror">{{ isset($company) ? $company->description : old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Persyaratan </label>
                            <textarea id="description" name="requirements" cols="40" rows="30"
                                class="form-control  @error('requirements')is-invalid @enderror">{{ isset($company) ? $company-> old('requirements') }}</textarea>
                            @error('requirements')
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
