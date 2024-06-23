@extends('adminTemplate.layouts.main')
@section('container')
<div class="row">
    <div class="col-6">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ isset($testimoni) ? $testimoni->jobSeeker->first_name . ' ' . $testimoni->jobSeeker->last_name : old('name') }}" readonly>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="job">Job</label>
            <input type="text" id="job" name="job" class="form-control @error('job') is-invalid @enderror"
                value="{{ isset($testimoni) ? $testimoni->job : old('job') }}" readonly>
            @error('job')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="quote">Quote</label>
            <textarea id="quote" name="quote" class="form-control @error('quote') is-invalid @enderror" readonly>{{ isset($testimoni) ? $testimoni->quote : old('quote') }}</textarea>
            @error('quote')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <a href="{{ URL::to('admin/testimoni') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
</div>
@endsection
