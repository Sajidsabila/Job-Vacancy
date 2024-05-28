<!-- resources/views/job-seekers/list-job.blade.php -->

@extends('landing-page.layouts.main')

@section('content')
    <main>
        <div class="our-services section-pad-t30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <h2>Semua Kategori Pekerjaan</h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    @foreach ($categories as $category)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
                                <div class="services-ion">
                                    <span class="{{ $category->icon }}"></span>
                                </div>
                                <div class="services-cap">
                                    <h5><a href="job_listing.html">{{ $category->category }}</a></h5>
                                    <span>(653)</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </main>
@endsection
