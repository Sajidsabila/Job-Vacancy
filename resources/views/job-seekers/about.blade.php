@extends ('landing-page.layouts.main')
@section('content')
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-white">
                            <div class="hero-cap text-center text-white">
                                <h2>About Us</h2>
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
                        <div class="col-xl-6 col-lg-6">
                            <div class="right-caption">
                                <!-- Section Tittle -->
                                <div class="section-tittle section-tittle2">
                                    <span>What we are doing</span>
                                    <h2>Welcome to Job Vacancy</h2>
                                </div>
                                <div class="support-caption">
                                    <p class="pera-top">At Job Vacancy, we believe in connecting talented individuals with
                                        opportunities that can transform their lives and careers. Our platform serves as a
                                        bridge between job seekers and employers, making the job search process efficient,
                                        transparent, and rewarding.</p>
                                    <p>Our mission is to empower job seekers by providing them with the tools and resources
                                        they
                                        need to find meaningful employment. We aim to support employers in their quest to
                                        find
                                        the right talent, fostering an environment where both parties can thrive.</p>
                                    <a href="{{ URL::to('/job-listing') }}" class="btn post-btn">Find a job</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="support-location-img">
                                <img src="img/service/support-img.jpg" alt="">
                                <div class="support-img-cap text-center">
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
