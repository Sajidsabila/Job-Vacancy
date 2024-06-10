<!-- resources/views/job-seekers/list-job.blade.php -->

@extends('landing-page.layouts.main')

@section('content')
    <main>
        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Semua Kategori Pekerjaan</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <div class="our-services section-pad-t30">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    @foreach ($categories as $category)
                        @php
                            $categories = $jobs->filter(function ($job) use ($category) {
                                return $job->job_category_id == $category->id;
                            });
                            $jobCount = $jobCounts[$category->id] ?? 0;
                            // Filter pekerjaan hanya untuk kategori saat ini
                            $jobsForCategory = $jobs->where('job_category_id', $category->id);
                        @endphp
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-services text-center mb-30">
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
                                    <span>{{ $jobCount }} Jobs</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </main>
@endsection
