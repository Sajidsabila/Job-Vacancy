@extends ('landing-page.layouts.main')
@section('content')
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="{{ asset('img/hero/about.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2 style="color: white">{{ $title }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->

        <!-- Support Company Start-->
        <div class="support-company-area fix section-padding2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span>What we are doing</span>
                                <h2>{{ $welcome }}</h2>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top">{!! $configuration->description !!}</p>
                                <p></p>
                                <a href="{{ URL::to('/job-listing') }}" class="btn post-btn" data-aos="zoom-in"
                                    data-aos-duration="1000">Find a job</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img" data-aos="fade-left" data-aos-duration="1000">
                            <img src="img/service/support-img.jpg" alt="">
                            <div class="support-img-cap text-center"data-aos="fade-up" data-aos-duration="1000">
                                <p>Since</p>
                                <span>2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Company End-->

    </main>
@endsection
