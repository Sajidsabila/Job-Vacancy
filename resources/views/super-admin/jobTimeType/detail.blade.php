@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="type">Job Time Type</label>
                <input type="text" id="type" name="type" class="form-control" value="{{ $jobTimeType->type }}"
                    readonly>
            </div>
            <a href="{{ URL::to('admin/jobTimeType') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
@endsection
