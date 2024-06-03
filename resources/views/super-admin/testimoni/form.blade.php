@extends('adminTemplate.layouts.main')
@section('container')

    @if (isset($testimoni))
        <form method="POST" action="{{ URL::to('admin/testimoni/' . $testimoni->id) }}" autocomplete="off">
            @method('put')
        @else
            <form method="POST" action="{{ URL::to('admin/testimoni') }}" autocomplete="off" enctype="multipart/form-data">
    @endif

    @csrf
    <div class="row">
        <div class="col-6">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name')is-invalid @enderror"
                    value="{{ isset($testimoni) ? $testimoni->name : old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="job">Job</label>
                <input type="text" id="job" name="job" class="form-control @error('job')is-invalid @enderror"
                    value="{{ isset($testimoni) ? $testimoni->job : old('job') }}">
                @error('job')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="quote">Quote</label>
                <input type="textarea" id="quote" name="quote"
                    class="form-control @error('quote')is-invalid @enderror"
                    value="{{ isset($testimoni) ? $testimoni->quote : old('quote') }}">
                @error('quote')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image"
                    class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="form-group">
                <label for="role">Role</label>
                <select class="form-control @error('role')is-invalid @enderror" name="role" id="role">
                    <option
                        value="Testimoni {{ isset($testimoni) ? ($testimoni->role === 'Testimoni' ? 'selected' : '') : '' }}">
                        Testimoni</option>
                    <option value="Admin {{ isset($testimoni) ? ($testimoni->role === 'Admin' ? 'selected' : '') : '' }}">
                        Admin
                    </option>
                </select> --}}
            {{-- </div> --}}
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ URL::to('admin/testimoni') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
    </form>
@endsection
