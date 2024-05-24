@extends('adminTemplate.layouts.main')
@section('container')


@if(isset($category))
 <form method="post" action="{{ URL::to('category/' . $category->id) }}" autocomplete="off">
    @method('put')
    @else
<div class="row">
    <h3>Data Perusahaan Website</h3>
    <div class="col-6">
        <form method="post" action="{{ URL::to('category')}}" autocomplete="off">
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Icon</label>
                <input type="text" id="icon" name="icon" placeholder="Masukkan Dengan Class ion Icon" value="{{ isset($category) ? $category->name : old('name') }}" class="form-control @error('name')is-invalid @enderror">
                @error('icon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Kategory Pekerjaan</label>
                <input type="text" id="category" name="category"  value="{{ isset($category) ? $category->description : old('name') }}"
                    class="form-control @error('username')is-invalid @enderror">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-2 form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ URL::to('user/')}}" class=" btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>

</div>
@endsection