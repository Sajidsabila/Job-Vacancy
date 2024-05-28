@extends('adminTemplate.layouts.main')
@section('container')

<h3>{{ isset($job) ? "Edit Data Pekerjaan" : "Tambah Data Pekerjaan" }}</h3>
<div class="row">
    <div class="col-6">
        <form method="post" action="{{ isset($job) ? URL::to('/companie/jobs/' . $job->id) : URL::to('/companie/jobs') }}" autocomplete="off">
            @csrf
            @if(isset($job))
                @method('put')
            @endif

            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" id="icon" name="icon" placeholder="Masukkan Dengan Class ion Icon" value="{{ isset($job) ? $job->icon : old('icon') }}" class="form-control @error('icon')is-invalid @enderror">
                @error('icon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Kategori Pekerjaan</label>
                <input type="text" id="category" name="category" placeholder="Masukkan Kategori Pekerjaan" value="{{ isset($job) ? $job->category : old('category') }}" class="form-control @error('category')is-invalid @enderror">
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-2 form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ URL::to('/companie/jobs') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection
