@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')

    <h3> {{ $title }} </h3>
    <hr>
    <div class="row mt-3">
        <div class="col-6">
            @if (isset($configuration))
                <form method="post" action="{{ URL::to('/admin/configuration/' . $configuration->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @method('put')
                @else
                    <form method="post" action="{{ URL::to('/admin/configuration') }}" autocomplete="off"
                        enctype="multipart/form-data">
            @endif
            @csrf
            <div class="form-group">
                @if (isset($configuration))
                    <img src="{{ URL::to('storage/' . $configuration->logo) }}" alt="Image" width="300px">
                @endif
                <br>
                <br>
                <label for="name">Logo Perusahaan</label>
                <input type="file" id="logo" name="logo"
                    value="{{ isset($configuration) ? $configuration->logo : old('logo') }}"placeholder="Masukkan Dengan Class ion Icon"
                    class="form-control @error('logo')is-invalid @enderror">

                @error('logo')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                {{-- diperbaiki nanti saja supaya tidak lama --}}
            </div>
            <div class="form-group">
                <label for="name">Nama Perusahaan</label>
                <input type="text" id="company_name" name="company_name"
                    class="form-control @error('company_name')is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->company_name : old('company_name') }}">
                {{-- anda isikan oldnya supaya tidak --}}
                @error('company_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control @error('phone')is-invalid @enderror"
                    value="{{ isset($configuration) ? $configuration->phone : old('phone') }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" id="email" name="email"
                    value="{{ isset($configuration) ? $configuration->email : old('email') }}"
                    class="form-control @error('email')is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Alamat Perusahaan</label>

                {{-- pada name juga salah itu yangm embuat validassinya salah nanti saja, join met lagi ka .k 9+ --}}
                <input type="text" id="company_addres" name="company_addres"
                    value="{{ isset($configuration) ? $configuration->company_name : old('company_addres') }}"
                    class="form-control @error('company_addres')is-invalid @enderror">
                @error('company_addres')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Tagline</label>

                {{-- pada name juga salah itu yangm embuat validassinya salah nanti saja, join met lagi ka .k --}}
                <input type="text" id="tagline" name="tagline"
                    value="{{ isset($configuration) ? $configuration->tagline : old('tagline') }}"
                    class="form-control @error('tagline')is-invalid @enderror">
                @error('tagline')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Harga Per Postingan Lowongan</label>

                {{-- pada name juga salah itu yangm embuat validassinya salah nanti saja, join met lagi ka .k --}}
                <input type="text" id="price_post" name="price_post"
                    value="{{ isset($configuration) ? $configuration->price_post : old('price_post') }}"
                    class="form-control @error('price_post')is-invalid @enderror">
                @error('price_post')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Deskripsi</label>
                <textarea name="description" id="description" cols="30" rows="10"
                    class="form-control @error('description')is-invalid @enderror">{{ isset($configuration) ? $configuration->description : old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mt-2 form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>

            </div>
            </form>
        </div>
    </div>

    </div>
@endsection
