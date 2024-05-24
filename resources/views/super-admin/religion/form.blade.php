@extends('adminTemplate.layouts.main')
@section('container')
    @if (isset($religion))
        <form method="POST" action="{{ URL::to('religion/' . $religion->id) }}" autocomplete="off">
            @method('put')
    @else
        <form method="POST" action="{{ URL::to('religion') }}" autocomplete="off">
    @endif

    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" class="form-control @error('id')is-invalid @enderror"
                    value="{{ isset($religion) ? $religion->id : old('id') }}">
                @error('id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="religion">Religion</label>
                <input type="text" id="religion" name="religion" class="form-control @error('religion')is-invalid @enderror"
                    value="{{ isset($religion) ? $religion->religion : old('religion') }}">
                @error('religion')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ URL::to('religion') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
    </form>
@endsection
