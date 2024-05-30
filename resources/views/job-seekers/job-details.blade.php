@extends ('landing-page.layouts.main')
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
                                <h2>UI/UX Designer</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    @foreach ($jobs as $job)
                        <!-- Left Content -->
                        <div class="col-xl-7 col-lg-8">
                            <!-- job single -->
                            <div class="single-job-items mb-50">
                                <div class="job-items">
                                    <div class="company-img company-img-details">
                                        <a href="#"><img src="{{ $company->logo }}" alt=""></a>
                                    </div>
                                    <div class="job-tittle">
                                        <a href="#">
                                            <h4>{{ $job->title }}</h4>
                                        </a>
                                        <ul>
                                            <li>{{ $company->company_name }}</li>
                                            <li><i class="fas fa-map-marker-alt"></i>{{ $company->addres }}</li>
                                            <li>{{ $job->salary }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- job single End -->

                            <div class="job-post-details">
                                <div class="post-details1 mb-50">
                                    <!-- Small Section Tittle -->
                                    <div class="small-section-tittle">
                                        <h4>Job Description</h4>
                                    </div>
                                    <p>{{ $job->description }}</p>
                                </div>
                                <div class="post-details2  mb-50">
                                    <!-- Small Section Tittle -->
                                    <div class="small-section-tittle">
                                        <h4>Required Knowledge, Skills, and Abilities</h4>
                                    </div>
                                    <ul>
                                        <li>{{ $job->requirements }}</li>
                                    </ul>
                                </div>
                                {{-- <div class="post-details2  mb-50">
                                    <!-- Small Section Tittle -->
                                    <div class="small-section-tittle">
                                        <h4>Education + Experience</h4>
                                    </div>
                                    <ul>
                                        <li>3 or more years of professional design experience</li>
                                        <li>Direct response email experience</li>
                                        <li>Ecommerce website design experience</li>
                                        <li>Familiarity with mobile and web apps preferred</li>
                                        <li>Experience using Invision a plus</li>
                                    </ul>
                                </div> --}}
                            </div>

                        </div>
                        <!-- Right Content -->
                        <div class="col-xl-4 col-lg-4">
                            {{-- <div class="post-details3  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Overview</h4>
                                </div>
                                <ul>
                                    <li>Posted date : <span>12 Aug 2019</span></li>
                                    <li>Location : <span>New York</span></li>
                                    <li>Vacancy : <span>02</span></li>
                                    <li>Job nature : <span>Full time</span></li>
                                    <li>Salary : <span>$7,800 yearly</span></li>
                                    <li>Application date : <span>12 Sep 2020</span></li>
                                </ul>
                                <div class="apply-btn2">
                                    <a href="#" class="btn">Apply Now</a>
                                </div>
                            </div> --}}
                            <div class="post-details4  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Company Information</h4>
                                </div>
                                <span>{{ $company->company_name }}</span>
                                <p>{{ $company->description }}</p>
                                <ul>
                                    <li>Name: <span>{{ $company->company_name }}</span></li>
                                    <li>Phone : <span>{{ $company->phone }}</span></li>
                                    <li>Email: <span>{{ $company->email }}</span></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>
@endsection
