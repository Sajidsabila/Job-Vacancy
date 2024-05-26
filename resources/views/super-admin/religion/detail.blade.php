<!-- resources/views/religion/detail.blade.php -->

@extends('adminTemplate.layouts.main')
@section('container')
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" class="form-control" value="{{ $religion->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="religion">Religion</label>
                <input type="text" id="religion" name="religion" class="form-control" value="{{ $religion->religion }}" readonly>
            </div>
            <a href="{{ URL::to('admin/religion') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
@endsection
