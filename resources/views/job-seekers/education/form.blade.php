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
                    @if (isset($education))
                        <form action="{{ URL::to('/education-user/' . $education->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                        @else
                            <form action="{{ URL::to('/education-user') }}" method="post" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Pilih Jenjang</label>
                                    <br>
                                    <select name="education_level_id"
                                        class="form-control  @error('education_level_id')is-invalid @enderror mb-2 w-100"
                                        style="width: 100%;">
                                        @foreach ($educationallevels as $educationallevel)
                                            <option value="{{ $educationallevel->id }}"
                                                {{ isset($education) ? ($education->education_level_id === $educationallevel->id ? 'selected' : '') : '' }}>
                                                {{ $educationallevel->level }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('education_level_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nama Institusi</label>
                                    <input type="text" name="school"
                                        class="form-control @error('school')is-invalid @enderror mb-2"
                                        value="{{ isset($education) ? $education->school : old('school') }}">
                                    @error('school')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-flex flex-row gap-3">
                                    <div class="form-group">
                                        <label class="form-label">Mulai Di Bulan</label>
                                        <br>
                                        <select name="start_month"
                                            class="form-control @error('start_month')is-invalid @enderror w-100 mb-2"
                                            id="start_month" required>
                                            <option value="Januari"
                                                {{ isset($education) ? ($education->start_month == 'Januari' ? 'selected' : '') : '' }}>
                                                January</option>
                                            <option value="Februari"
                                                {{ isset($education) ? ($education->start_month == 'Februari' ? 'selected' : '') : '' }}>
                                                February</option>
                                            <option value="Maret"
                                                {{ isset($education) ? ($education->start_month == 'Maret' ? 'selected' : '') : '' }}>
                                                Maret</option>
                                            <option value="April"
                                                {{ isset($education) ? ($education->start_month == 'April' ? 'selected' : '') : '' }}>
                                                April</option>
                                            <option value="Mei"
                                                {{ isset($education) ? ($education->start_month == 'Mei' ? 'selected' : '') : '' }}>
                                                Mei</option>
                                            <option value="Juni"
                                                {{ isset($education) ? ($education->start_month == 'Juni' ? 'selected' : '') : '' }}>
                                                Juni</option>
                                            <option value="Juli"
                                                {{ isset($education) ? ($education->start_month == 'Juli' ? 'selected' : '') : '' }}>
                                                Juli</option>
                                            <option value="Agustus"
                                                {{ isset($education) ? ($education->start_month == 'Agustus' ? 'selected' : '') : '' }}>
                                                Augustus</option>
                                            <option value="September"
                                                {{ isset($education) ? ($education->start_month == 'September' ? 'selected' : '') : '' }}>
                                                September</option>
                                            <option value="Oktober"
                                                {{ isset($education) ? ($education->start_month == 'Oktober' ? 'selected' : '') : '' }}>
                                                Oktober</option>
                                            <option value="November"
                                                {{ isset($education) ? ($education->start_month == 'November' ? 'selected' : '') : '' }}>
                                                November</option>
                                            <option value="Desember"
                                                {{ isset($education) ? ($education->start_month == 'Desember' ? 'selected' : '') : '' }}>
                                                Desember</option>
                                        </select>
                                        @error('start_month')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group ml-4">
                                        <label class="form-label">Mulai Di Tahun</label>
                                        <input type="number" name="start_year"
                                            class="form-control @error('start_year')is-invalid @enderror mb-2"
                                            value="{{ isset($education) ? $education->start_year : old('start_year') }}">
                                        @error('start_year')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="ongoing" id="ongoing" onclick="toggleEndYear()"
                                        {{ isset($education) ? ($education->ongoing ? 'checked' : '') : '' }}>
                                    <label for="ongoing">Sedang Berlangsung</label>
                                </div>
                                <div class="d-flex flex-row gap-3" id="end_field">
                                    <div class="form-group" id="end_month_field">
                                        <label class="form-label" id="end_month_field">Berakhir Di Bulan</label>
                                        <br>
                                        <select name="end_month"
                                            class="form-control  @error('end_month')is-invalid @enderror w-100 mb-2"
                                            id="end_month_field">
                                            <option value="Januari"
                                                {{ isset($education) ? ($education->end_month == 'Januari' ? 'selected' : '') : '' }}>
                                                January</option>
                                            <option value="Februari"
                                                {{ isset($education) ? ($education->end_month == 'Februari' ? 'selected' : '') : '' }}>
                                                February</option>
                                            <option value="Maret"
                                                {{ isset($education) ? ($education->end_month == 'Maret' ? 'selected' : '') : '' }}>
                                                Maret</option>
                                            <option value="April"
                                                {{ isset($education) ? ($education->end_month == 'April' ? 'selected' : '') : '' }}>
                                                April</option>
                                            <option value="Mei"
                                                {{ isset($education) ? ($education->end_month == 'Mei' ? 'selected' : '') : '' }}>
                                                Mei</option>
                                            <option value="Juni"
                                                {{ isset($education) ? ($education->end_month == 'Juni' ? 'selected' : '') : '' }}>
                                                Juni</option>
                                            <option value="Juli"
                                                {{ isset($education) ? ($education->end_month == 'Juli' ? 'selected' : '') : '' }}>
                                                Juli</option>
                                            <option value="Agustus"
                                                {{ isset($education) ? ($education->end_month == 'Agustus' ? 'selected' : '') : '' }}>
                                                Augustus</option>
                                            <option value="September"
                                                {{ isset($education) ? ($education->end_month == 'September' ? 'selected' : '') : '' }}>
                                                September</option>
                                            <option value="Oktober"
                                                {{ isset($education) ? ($education->end_month == 'Oktober' ? 'selected' : '') : '' }}>
                                                Oktober</option>
                                            <option value="November"
                                                {{ isset($education) ? ($education->end_month == 'November' ? 'selected' : '') : '' }}>
                                                November</option>
                                            <option value="Desember"
                                                {{ isset($education) ? ($education->end_month == 'Desember' ? 'selected' : '') : '' }}>
                                                Desember</option>
                                        </select>
                                        @error('end_month')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group ml-4" id="end_year_field">
                                        <label class="form-label" id="end_year_field">Mulai Di Tahun</label>
                                        <input type="number" name="end_year" id="end_year_field"
                                            class="form-control @error('end_year')is-invalid @enderror mb-2"
                                            value="{{ isset($education) ? $education->end_year : old('phone') }}">
                                        @error('end_year')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left m-4">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
