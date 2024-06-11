@extends('adminTemplate.layouts.main')
@section('container')
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $contacts->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $contacts->email }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" value="{{ $contacts->description }}" readonly>
            </div>
            <a href="{{ URL::to('admin/testimoni') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>

    </div>
@endsection
