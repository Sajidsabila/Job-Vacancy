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
                    @if (isset($jobseeker))
                        <form action="{{ URL::to('/profile/' . $jobseeker->id) }}" method="post"
                            enctype="multipart/form-data">
                            @method('put')
                        @else
                            <form action="{{ URL::to('/profile') }}" method="post" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                @if (isset($jobseeker))
                                    <img src="{{ asset('storage/' . $jobseeker->photo) }}"
                                        alt="{{ $jobseeker->first_name }}" class="d-block ui-w-80">
                                @endif
                                <div class="media-body ml-4">
                                    <div class="form-group">
                                        <input type="file" name="photo"
                                            class="form-control @error('photo')is-invalid @enderror">
                                        @error('photo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="d-flex flex-row ">
                                    <div class="form-group">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name"
                                            class="form-control @error('first_name')is-invalid @enderror"
                                            value=" {{ isset($jobseeker) ? $jobseeker->first_name : old('first_name') }}">
                                        @error('first_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group
                                                ml-4">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name"
                                            class="form-control  @error('last_name')is-invalid @enderror mb-2"
                                            value="{{ isset($jobseeker) ? $jobseeker->last_name : old('first_name') }}">
                                        @error('last_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="birth_date"
                                        class="form-control @error('birth_date')is-invalid @enderror mb-2"
                                        value="{{ isset($jobseeker) ? $jobseeker->birth_date : old('birth_date') }}">
                                    @error('birth_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nik</label>
                                    <input type="number" name="nik"
                                        class="form-control @error('nik')is-invalid @enderror mb-2"
                                        value="{{ isset($jobseeker) ? $jobseeker->nik : old('nik') }}" maxlength="16">
                                    @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <br>
                                    <select name="gender"
                                        class="form-control @error('gender')is-invalid @enderror mb-2 w-100"
                                        style="width: 100%;">
                                        <option value="Laki - laki"
                                            {{ isset($jobseeker) ? ($jobseeker->gender === 'Laki - laki' ? 'selected' : '') : '' }}>
                                            Laki - laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ isset($jobseeker) ? ($jobseeker->gender === 'Perempuan' ? 'selected' : '') : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Agama</label>
                                    <br>
                                    <select name="religion_id"
                                        class="form-control  @error('religion_id')is-invalid @enderror mb-2 w-100"
                                        style="width: 100%;">
                                        @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}"
                                                {{ isset($jobseeker) ? ($jobseeker->religion_id === $religion->id ? 'selected' : '') : '' }}>
                                                {{ $religion->religion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('religion_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">No Handphone</label>
                                    <input type="text" name="phone"
                                        class="form-control @error('phone')is-invalid @enderror mb-2"
                                        value="{{ isset($jobseeker) ? $jobseeker->phone : old('phone') }}">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Alamat Tempat Tinggal</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address')is-invalid @enderror mb-2"
                                        value="{{ isset($jobseeker) ? $jobseeker->address : old('address') }}">
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tentang Diri Anda</label>
                                    <textarea class="form-control @error('description')is-invalid @enderror" name="description" id="description">{{ isset($jobseeker) ? $jobseeker->description : old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left m-4">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="{{ URL::to('/profile') }}" type="reset" class="btn btn-default">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
