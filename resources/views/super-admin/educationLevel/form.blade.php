@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    @if (@isset($educationLevel))
        <form method="POST" action="{{ URL::to('admin/educationLevel/' . $educationLevel->id) }}" autocomplete="off">
            @method('put')
        @else
            <form method="POST" action="{{ URL::to('admin/educationLevel') }}" autocomplete="off">
    @endif

    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="level">Name</label>
                <input type="text" id="level" name="level" class="form-control @error('level')is-invalid @enderror"
                    value="{{ isset($educationLevel) ? $educationLevel->level : old('level') }}">
                @error('level')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description"
                    class="form-control @error('description')is-invalid @enderror"
                    value="{{ isset($educationLevel) ? $educationLevel->description : old('description') }}">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ URL::to('admin/educationLevel') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
    </form>
@endsection
