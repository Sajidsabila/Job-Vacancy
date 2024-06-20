@extends('adminTemplate.layouts.main')
@section('container')
    @if (isset($requirement))
        <form method="POST" action="{{ URL::to('companie/requirement/' . $requirement->id) }}" autocomplete="off">
            @method('put')
        @else
            <form method="POST" action="{{ URL::to('companie/requirement') }}" autocomplete="off">
    @endif

    @csrf
    <div class="row">
        <div class="col-6">

            <div class="form-group">
                <label for="religion">Requirement</label>
                <input type="text" id="type" name="type"
                    class="form-control @error('requirements')is-invalid @enderror"
                    value="{{ isset($requirement) ? $requirement->type : old('requirements') }}">
                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ URL::to('companie/requirement') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
    </form>
@endsection
