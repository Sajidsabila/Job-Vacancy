<!-- resources/views/job-seekers/list-job.blade.php -->

@extends('landing-page.layouts.main')

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
            </div>
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
