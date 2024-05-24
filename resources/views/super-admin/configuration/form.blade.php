@extends ('adminTemplate.layouts.main')
@section('container')
@if(isset($category))
 <form method="post" action="{{ URL::to('category/' . $category->id) }}" autocomplete="off">
    @method('put')
    @else
     <h3> {{ $title }} </h3>
     <hr>
<div class="row mt-3">
    <div class="col-6">
        <form method="post" action="{{ URL::to('/admin/configuration/create')}}" autocomplete="off" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Logo Perusahaan</label>
                <input type="file" id="logo" name="logo" placeholder="Masukkan Dengan Class ion Icon" value="{{ isset($category) ? $category->name : old('icon') }}" class="form-control @error('logo')is-invalid @enderror">
                @error('logo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama Perusahaan</label>
                <input type="text" id="company_name" name="company_name"  value="{{ isset($category) ? $category->description : old('name') }}"
                    class="form-control @error('company_name')is-invalid @enderror">
                @error('company_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                   <div class="form-group">
                <label for="name">Phone</label>
                <input type="text" id="phone" name="phone"  value="{{ isset($category) ? $category->description : old('phone') }}"
                    class="form-control @error('phone')is-invalid @enderror">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
             <div class="form-group">
                <label for="name">Email</label>
                <input type="email" id="email" name="email"  value="{{ isset($category) ? $category->description : old('name') }}"
                    class="form-control @error('email')is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
       <div class="form-group">
                <label for="name">Alamat Perusahaan</label>
                <input type="description" id="description" name="description"  value="{{ isset($category) ? $category->description : old('name') }}"
                    class="form-control @error('description')is-invalid @enderror">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
             <div class="form-group">
                <label for="name">Deskripsi</label>
               <textarea name="description" id="description" cols="30" rows="10"  class="form-control @error('description')is-invalid @enderror"></textarea>
                @error('description')
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