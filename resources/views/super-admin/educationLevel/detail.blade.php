@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="level">Level</label>
                <input type="text" id="level" name="level" class="form-control" value="{{ $educationLevel->level }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" value="{{ $educationLevel->description }}"
                    readonly>
            </div>
            <a href="{{ URL::to('admin/educationLevel') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
@endsection
