@extends ('adminTemplate.layouts.main')
@section('container')
@include('sweetalert::alert')
<section class="content">

  @section('breadcrumbs')
  {{ Breadcrumbs::render('admin.dashboard') }}
  @endsection

  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">CPU Traffic</span>
          <span class="info-box-number">
            10
            <small>%</small>
          </span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Likes</span>
          <span class="info-box-number">41,410</span>
        </div>
      </div>
    </div>

    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Sales</span>
          <span class="info-box-number">760</span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">New Members</span>
          <span class="info-box-number">2,000</span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Nama Perusahaan</div>
        <div class="card-body">
          <div class="row mt-3">
            @foreach($configurations as $configuration)
            <div class="col-6 ms-5">
              <img src="{{ URL::to('storage/'. $configuration->logo) }}" alt="{{ $configuration->company_name }}" width="300px">
            </div>

            <div class="col-6">
              <div class="col-12">
                <div class="form-group">
                  <label for="name">Nama Perusahaan</label>
                  <input type="email" id="email" name="email" value="{{ $configuration->company_name }}" class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label for="name">Deskripsi Perusahaan</label>
                  <textarea class="form-control" readonly>{{ $configuration->description }}</textarea>
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label for="name">Email Perusahaan</label>
                  <input type="email" id="email" name="email" value="{{ $configuration->email }}" class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
              </div>
              
              <div class="col-12">
                <div class="form-group">
                  <label for="name">Nomer Telpon Perusahaan</label>
                  <input type="email" id="email" name="email" value="{{ $configuration->phone }}" class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
              </div>
              
              <div class="col-12">
                <div class="form-group">
                  <label for="name">Alamat Perusahaan</label>
                  <input type="email" id="email" name="email" value="{{ $configuration->company_addres }}" class="form-control @error('email')is-invalid @enderror" readonly>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
@endsection
