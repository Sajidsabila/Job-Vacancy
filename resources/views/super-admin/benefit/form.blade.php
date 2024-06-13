@extends('adminTemplate.layouts.main')
@section('container')
    @if (isset($benefit))
        <form method="POST" action="{{ URL::to('admin/benefit/' . $benefit->id) }}" autocomplete="off">
            @method('put')
        @else
            <form method="POST" action="{{ URL::to('admin/benefit') }}" autocomplete="off">
    @endif

    @csrf
    <div class="row">
        <div class="col-6">

            <div class="form-group">
                <label for="religion">benefit</label>
                <input benefit="text" id="benefit" name="benefit"
                    class="form-control @error('requirements')is-invalid @enderror"
                    value="{{ isset($benefit) ? $benefit->benefit : old('benefit') }}">
                @error('benefit')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button benefit="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ URL::to('admin/benefit') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
    </form>
@endsection
