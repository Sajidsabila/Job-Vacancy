@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    @if (isset($religion))
        <form method="POST" action="{{ URL::to('admin/religion/' . $religion->id) }}" autocomplete="off">
            @method('put')
        @else
            <form method="POST" action="{{ URL::to('admin/religion') }}" autocomplete="off">
    @endif

    @csrf
    <div class="row">
        <div class="col-6">

            <div class="form-group">
                <label for="religion">Religion</label>
                <input type="text" id="religion" name="religion"
                    class="form-control @error('religion')is-invalid @enderror"
                    value="{{ isset($religion) ? $religion->religion : old('religion') }}">
                @error('religion')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ URL::to('admin/religion') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
    </form>
@endsection
