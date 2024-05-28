@extends ('adminTemplate.layouts.main')
@section('container')
    @include('sweetalert::alert')



    <h3> {{ $title }} </h3>
    <hr>
    <div class="row mt-3">
        <div class="col-6 ms-5">
            <img src="{{ URL::to('storage/' . $company->logo) }}" alt="{{ $company->company_name }}" width="300px">
        </div>

        <div class="col-6">
            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nama Perusahaan</label>
                    <input type="email" id="email" name="email" value="{{ $company->company_name }}"
                        class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name">Deskripsi Perusahaan</label>
                    {!! $company->deskripsi !!}
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name">Email Perusahaan</label>
                    <input type="email" id="email" name="email" value="{{ $company->email }}"
                        class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name">Nomer Telpon Perusahaan</label>
                    <input type="email" id="email" name="email" value="{{ $company->phone }}"
                        class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="name">Alamat Perusahaan</label>
                    <input type="email" id="email" name="email" value="{{ $company->addres }}"
                        class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
            </div>

        </div>
        <a href="{{ URL::to('/companie/company-profile/' . $company->id . '/edit') }}"
            class="btn btn-warning btn-md m-2">Edit</a>

    </div>
@endsection
