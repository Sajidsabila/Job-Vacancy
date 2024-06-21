@extends ('landing-page.layouts.main')
@section('content')
    <main>

        <style>
            .image {
                max-width: 10px;
                /* make the image responsive */
                height: 10px;
                /* maintain the image's aspect ratio */
            }
        </style>
        <!-- slider Area Start-->
        <div class="slider-area">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center"
                    style="background-image: url('{{ asset('img/hero/h1_hero.jpg') }}');">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Find the most exciting startup jobs</h1>
                                </div>
                                <!-- Search Box -->
                                <div class="mt-4">
                                    <form action="{{ route('job_listing') }}" method="GET"
                                        class="search-box d-flex flex-column flex-md-row align-items-stretch">
                                        <div class="input-form input-group flex-fill mb-2 mb-md-0">
                                            <input type="text" name="keyword" class="form-control"
                                                placeholder="Job Title or keyword">
                                        </div>
                                        <div class="search-form input-group-append ml-md-2">
                                            <button type="submit" class="btn btn-primary btn-block"
                                                style="display: flex; align-items: center; justify-content: center;">Find
                                                job</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- slider Area End-->
        <!-- Our Services Start -->
        <div class="our-services section-pad-t30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center" data-aos="fade-down" data-aos-duration="500">
                            @auth
                                @if (auth()->user()->role === 'User')
                                    @if (!$jobseekerExists)
                                        <div class="alert alert-warning" role="alert">
                                            Profil Anda Masih Kosong. Segera lengkapi untuk bisa melamar kerja.
                                            <br>
                                            <a href="{{ URL::to('/profile') }}" class="m-2 btn btn-primary btn-sm">Lengkapi
                                                Profile</a>
                                        </div>
                                    @endif
                                    {{-- Debugging: Tampilkan nilai $jobseekerExists --}}
                                @endif
                            @endauth
                            <span>FEATURED TOURS Packages</span>
                            <h2>Browse Top Categories </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-contnet-center">
                    @foreach ($categories as $category)
                        @php
                            $categories = $jobs->filter(function ($job) use ($category) {
                                return $job->job_category_id == $category->id;
                            });
                            $jobCount = $jobCounts[$category->id] ?? 0;
                            // Filter pekerjaan hanya untuk kategori saat ini
                            $jobsForCategory = $jobs->where('job_category_id', $category->id);
                        @endphp
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6" data-aos="flip-left" data-aos-duration="2000">
                            <div id="category_{{ $category->id }}" class="single-services text-center mb-30 single-job-link"
                                data-url="{{ $jobCount > 0 ? route('jobs.by.category', $category->id) : '#' }}">
                                <div class="services-ion">
                                    <span class="{{ $category->icon }}"></span>
                                </div>
                                <div class="services-cap">
                                    @if ($jobCount > 0)
                                        <h5><a
                                                href="{{ route('jobs.by.category', $category->id) }}">{{ $category->category }}</a>
                                        </h5>
                                    @else
                                        <h5>{{ $category->category }}</h5>
                                    @endif
                                    {{-- @if ($jobCount > 0) --}}
                                    <span>{{ $jobCount }} Jobs</span>
                                    {{-- @else
                                        <span>0 Jobs</span>
                                    @endif --}}
                                    <!-- Tampilkan detail pekerjaan jika ada -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50" data-aos="zoom-in" data-aos-duration="1000">
                            <a href="{{ URL::to('/job-seekers/list-job') }}" class="border-btn2">Lihat Semua Kategori
                                Pekerjaan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->
        <!-- Online CV Area Start -->
        <div class="online-cv cv-bg section-overly pt-90 pb-120" data-background="assets/img/gallery/cv_bg.jpg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="cv-caption text-center" data-aos="fade-down" data-aos-duration="1000">
                            <p class="pera1">FEATURED TOURS Packages</p>
                            <p class="pera2"> Make a Difference with Your Online Resume!</p>
                            <a href="{{ URL::to('/profile') }}" class="border-btn2 border-btn4" data-aos="fade-up"
                                data-aos-duration="1000">Upload your cv</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Online CV Area End-->
        <!-- Featured_job_start -->
        <section class="featured-job-area feature-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-down" data-aos-duration="1000">
                        <div class="section-tittle text-center">
                            <span>Recent Job</span>
                            <h2>Featured Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        @foreach ($jobs as $job)
                            <!-- single-job-content -->
                            <div class="single-job-link" data-url="{{ URL::to('/job-details', $job->slug) }}"
                                data-aos="zoom-in" data-aos-duration="1000">
                                <div class="single-job-items mb-30">
                                    <div class="job-items">
                                        <div class="company-img">
                                            <a href="{{ URL::to('/job-details', $job->slug) }}"><img
                                                    src="{{ 'storage/' . $job->company->logo }}"
                                                    alt=" {{ $job->company->company_name }}" width="100"
                                                    height="auto"></a>
                                        </div>
                                        <div class="job-tittle">
                                            <a href="{{ URL::to('/job-details', $job->slug) }}">
                                                <h4>{{ $job->title }}</h4>
                                            </a>
                                            <ul>
                                                <li>{{ $job->company->company_name }}</li>
                                                <li><i class="fas fa-map-marker-alt"></i>{{ $job->job_location }}</li>
                                                <li>{{ number_format($job->salary) }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="items-link f-right">
                                        <a href="{{ URL::to('/job-details', $job->id) }}">{{ $job->jobTime->type }}</a>
                                        <span>{{ $job->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured_job_end -->
        <!-- How  Apply Process Start-->
        <div class="apply-process-area pt-80 pb-100 section-overly" data-background="">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-down" data-aos-duration="1000">
                        <div class="section-tittle white-text text-center">
                            <span>Apply process</span>
                            <h2> How it works</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row flex-wrap">
                    @foreach ($applyProcesses as $applyProcess)
                        <div class="col-lg-4 col-md-6" data-aos="flip-left" data-aos-duration="2000">
                            <div class="single-process text-center mb-30">
                                <div class="process-ion">
                                    <span class="{{ $applyProcess->icon }}"></span>
                                </div>
                                <div class="process-cap">
                                    <h5>{{ $applyProcess->process }}</h5>
                                    <p>{{ $applyProcess->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
        <!-- How  Apply Process End-->
        <!-- Testimonial Area Start -->

        <div class="row">
            <div class="col-xl-12" data-aos="fade-down" data-aos-duration="1000">
                <div class="hero-cap text-center mt-5">
                    <h2>Testimonial</h2>
                </div>
            </div>
        </div>

        <div id="testimoni" class="testimonial-area testimonial-padding">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8 col-lg-8 col-md-10">
                        <div class="h1-testimonial-active dot-style">
                            @foreach ($testimonials as $item)
                                <div class="single-testimonial text-center">
                                    <div class="testimonial-caption">
                                        <div class="testimonial-founder">
                                            <div class="founder-img mb-30">
                                                <img class="rounded-circle"
                                                    src="{{ asset('storage/' . $item->jobSeeker->photo) }}"
                                                    alt="">
                                                <span>{{ $item->jobSeeker->first_name }}
                                                    {{ $item->jobSeeker->last_name }}</span>
                                                <p>{{ $item->job }}</p>
                                            </div>
                                        </div>
                                        <div class="testimonial-top-cap">
                                            <p>{{ $item->quote }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial Area End -->

        <!-- Hero Area Start-->
        {{-- <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="/img/hero/about.jpg"> --}}
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center" data-aos="fade-down" data-aos-duration="1000">
                        <h2>About us</h2>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div>
        </div> --}}
        <!-- Hero Area End -->

        <!-- Testimonial End -->
        <!-- Support Company Start-->

        <div class="support-company-area support-padding fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                <span>What we are doing</span>
                                <h2>24k Talented people are getting Jobs</h2>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top">At Job Vacancy, we believe in connecting talented individuals with
                                    opportunities that can transform their lives and careers. Our platform serves as a
                                    bridge between job seekers and employers, making the job search process efficient,
                                    transparent, and rewarding.</p>
                                <a href="{{ URL::to('/listing-job') }}" class="btn post-btn">Find job</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="support-location-img">
                            <img src="{{ asset('img/service/support-img.jpg') }}" alt="">
                            <div class="support-img-cap text-center" data-aos="fade-up" data-aos-duration="1000">
                                <p>Since</p>
                                <span>2024</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Company End-->
        <!-- Blog Area Start -->
        <div class="home-blog-area blog-h-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12" data-aos="fade-down" data-aos-duration="1000">
                        <div class="section-tittle text-center">
                            <span>Our latest blog</span>
                            <h2>Our recent news</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6" data-aos="flip-right" data-aos-duration="1000">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="{{ asset('img/blog/home-blog1.jpg') }}" alt="">
                                    <!-- Blog date -->
                                    <div class="blog-date text-center">
                                        <span>24</span>
                                        <p>Now</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>| Properties</p>
                                    <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a>
                                    </h3>
                                    <a href="#" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6" data-aos="flip-right" data-aos-duration="1000">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="{{ asset('img/blog/home-blog2.jpg') }}" alt="">
                                    <!-- Blog date -->
                                    <div class="blog-date text-center">
                                        <span>24</span>
                                        <p>Now</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>| Properties</p>
                                    <h3><a href="single-blog.html">Footprints in Time is perfect House in Kurashiki</a>
                                    </h3>
                                    <a href="#" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var jobLinks = document.querySelectorAll('.single-job-link');

            jobLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    window.location.href = link.getAttribute('data-url');
                });
            });

            var categories = document.querySelectorAll('.single-job-link');
            categories.forEach(function(category) {
                var jobCount = parseInt(category.querySelector('.services-cap span').textContent);
                if (jobCount === 0) {
                    category.style.pointerEvents =
                        'none'; // Menonaktifkan klik pada kategori yang tidak memiliki pekerjaan
                }
            });
        });
    </script>
@endsection
