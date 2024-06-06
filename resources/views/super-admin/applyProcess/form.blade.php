@extends('adminTemplate.layouts.main')
@section('container')
    <h3>{{ isset($applyProcess) ? 'Edit Data Apply Process' : 'Tambah Data Apply Process' }} </h3>
    @if (isset($applyProcess))
        <form method="post" action="{{ URL::to('/admin/applyProcess/' . $applyProcess->id) }}" autocomplete="off">
            @method('put')
        @else
            <div class="row">
                <div class="col-6">
                    <form method="post" action="{{ URL::to('/admin/applyProcess') }}" autocomplete="off">
    @endif
    @csrf

    <div class="form-group">
        <label for="name">Icon</label>
        <input type="text" id="icon" name="icon" placeholder="Masukkan Dengan Class ion Icon"
            value="{{ isset($applyProcess) ? $applyProcess->icon : old('icon') }}"
            class="form-control @error('icon')is-invalid @enderror">
        @error('icon')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="process">Process</label>
        <input type="text" id="process" placceholder="Masukkan Process" name="process"
            value="{{ isset($applyProcess) ? $applyProcess->process : old('process') }}"
            class="form-control @error('process')is-invalid @enderror">
        @error('process')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control @error('description')is-invalid @enderror"
            value="{{ isset($applyProcess) ? $applyProcess->description : old('description') }}">
        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mt-2 form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ URL::to('admin/applyProcess/') }}" class=" btn btn-secondary">Back</a>
    </div>
    </form>
    </div>
    </div>
    </div>
@endsection
