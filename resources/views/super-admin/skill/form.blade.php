@extends('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')
    @if (isset($skill))
        <form method="POST" action="{{ URL::to('admin/skill/' . $skill->id) }}" autocomplete="off">
            @method('put')
        @else
            <form method="POST" action="{{ URL::to('admin/skill') }}" autocomplete="off">
    @endif

    @csrf
    <div class="row">
        <div class="col-6">

            <div class="form-group">
                <label for="skill">Skill</label>
                <input type="text" id="skill" name="skill"
                    class="form-control @error('skill')is-invalid @enderror"
                    value="{{ isset($skill) ? $skill->skill : old('skill') }}">
                @error('skill')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Save</button>
            <a href="{{ URL::to('admin/skill') }}" class="btn btn-sm btn-secondary">Back</a>
        </div>
    </div>
    </form>
@endsection
