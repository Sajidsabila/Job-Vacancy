   @extends ('adminTemplate.layouts.main')
   @section('container')
       @include('sweetalert::alert')
       <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-4">
                <div class="card">
                    <div class="card-header">PRICE POSTING LOWONGAN</div>
                    <div class="card-body">
                        <h5>Harga {{ number_format($configuration->price_post) }} / Posting Lowongan Kerja</h5>
                        <br>
                        <form method="post" action="{{ URL::to('/companie/lowongan-kerja/order') }}">
                            @csrf
                            <input type="hidden" value="{{ $job->id }}" name="job_id">
                            <input type="hidden" value="{{ $configuration->price_post }}" name="price">
                            <button class="btn btn-primary">Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @endsection
