@extends('adminTemplate.layouts.main')
@section('container')

 <h3>{{ isset($jobCategory) ? "Edit Data Kategori Pekerjaan" : "Tambah Data Kategori Pekerjaan" }} </h3>
@if(isset($jobcategory))
 <form method="post" action="{{ URL::to('/admin/job-category/' . $jobcategory->id) }}" autocomplete="off">
    @method('put')
    @else

   
    <div class="row">
    <div class="col-6">
        <form method="post" action="{{ URL::to('/admin/job-category')}}" autocomplete="off">
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Icon</label>
                <input type="text" id="icon" name="icon" placeholder="Masukkan Dengan Class ion Icon" value="{{ isset($jobcategory) ? $jobcategory->icon : old('icon') }}" class="form-control @error('icon')is-invalid @enderror">
                @error('icon')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Kategory Pekerjaan</label>
                <input type="text" id="category" placceholde="Masukkan Kategori Pekerjaan" name="category"  value="{{ isset($jobcategory) ? $jobcategory->category : old('category') }}"
                    class="form-control @error('category')is-invalid @enderror">
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-2 form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ URL::to('admin/job-category')}}" class=" btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>

</div>
@endsection