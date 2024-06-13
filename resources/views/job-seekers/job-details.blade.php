@extends ('landing-page.layouts.main')
@section('content')
    @include('sweetalert::alert')
    <main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center"
                data-background="assets/img/hero/about.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2 style="color: white">{{ $job->title }}</h2>
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
                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Skill File</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form untuk mengunggah file skill -->
                                    <form action="{{ URL::to('/send-letter') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="skillFile">Lampirkan Lamaran</label>
                                            <input type="hidden" class="form-control" value="{{ $job->id }}"
                                                id="skillFile" name="job_id" required>
                                            <input type="file" class="form-control" id="skillFile" name="file"
                                                required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @foreach ($jobs as $job) --}}
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        @auth

                            @if (auth()->user()->role === 'User')
                                @if (!$profilexist)
                                    <div class="alert alert-warning" role="alert">
                                        Profil Anda Masih Kosong Segera Lengkapi Untuk Bisa Melamar Kerja
                                        <br>
                                        <a href="{{ URL::to('/profile') }}" class="m-2 btn btn-primary btn-sm">Lengkapi
                                            Profile</a>
                                    </div>
                                @endif
                            @endif
                        @endauth
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="{{ asset('storage/' . $job->company->logo) }}"
                                            alt=" {{ $job->company->company_name }}" width="100" height="auto"></a>


                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4>{{ $job->title }}</h4>
                                    </a>
                                    <ul>
                                        <li>{{ $job->company->company_name }}</li>
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $job->company->addres }}</li>
                                        <li>{{ number_format($job->salary) }}</li>
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
                                <p>{{ strip_tags($job->description) }}</p>
                            </div>

                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->

                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                                <ul>
                                    @foreach ($selectedRequirements as $requirementId)
                                        @php
                                            $requirement = $requirements->firstWhere('id', $requirementId);
                                        @endphp
                                        @if ($requirement)
                                            <li>{{ $requirement->type }}</li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>



                            <div class="post-details2  mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Benefit / Fasilitas</h4>
                                </div>
                                <ul>
                                    @foreach ($selectedBenefits as $requirementId)
                                        @php
                                            $benefit = $benefits->firstWhere('id', $requirementId);
                                        @endphp
                                        @if ($benefit)
                                            <li>{{ $benefit->benefit }}</li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Job Overview</h4>
                            </div>
                            <ul>
                                <li>Posted date : <span>{{ $job->created_at->format('d M Y') }}</span></li>
                                <li>Location : <span>{{ $job->job_location }}</span></li>
                                @foreach ($job_time as $key => $job_time)
                                    <li>Job nature : <span>{{ $job_time->type }}</span></li>
                                @endforeach
                                <li>Salary : <span>{{ number_format($job->salary) }}</span></li>
                                {{-- <li>Application date : <span>12 Sep 2020</span></li> --}}
                            </ul>
                            @auth


                                @if (auth()->user()->role == 'User')
                                    <div class="apply-btn2">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                                            Lamar Pekerjaan
                                        </button>
                                    </div>
                                @endif
                            @endauth
                        </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Company Information</h4>
                            </div>
                            <span>{{ $job->company->company_name }}</span>
                            <p>{{ $job->company->description }}</p>
                            <ul>
                                <li>Name: <span>{{ $job->company->company_name }}</span></li>
                                <li>Phone : <span>{{ $job->company->phone }}</span></li>
                                <li>Email: <span>{{ $job->company->email }}</span></li>
                            </ul>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
        <!-- job post company End -->

    </main>
@endsection
