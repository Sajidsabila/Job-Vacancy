@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    @if (@isset($jobTimeType))
        <form method="POST" action="{{ URL::to('admin/jobTimeType/' . $jobTimeType->id) }}" autocomplete="off">
            @method('put')
        @else
            <form method="POST" action="{{ URL::to('admin/jobTimeType') }}" autocomplete="off">
    @endif

    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="type">Job Time Type</label>
                <input type="text" id="type" name="type" class="form-control @error('type')is-invalid @enderror"
                    value="{{ isset($jobTimeType) ? $jobTimeType->type : old('type') }}">
                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ URL::to('admin/jobTimeType') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
    </form>
@endsection
