        <form action="{{ URL::to('listing-job') }}" method="get">
            <div class="job-listing-area pt-120 pb-120">
                <div class="container">
                    <div class="row">
                        <!-- Left content -->
                        <div class="col-xl-3 col-lg-3 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="small-section-tittle2 mb-45">
                                        <div class="ion"> <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="20px"
                                                height="12px">
                                                <path fill-rule="evenodd" fill="rgb(27, 207, 107)"
                                                    d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z" />
                                            </svg>
                                        </div>
                                        <h4>Filter Jobs</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Job Category Listing start -->
                            <div class="job-category-listing mb-50">
                                <!-- single one -->
                                <div class="single-listing">
                                    <div class="small-section-tittle2">
                                        <h4>Job Category</h4>
                                    </div>
                                    <!-- Select job items start -->
                                    <div class="select-job-items2">
                                        <select name="job_category_id">
                                            <option value="" {{ $jobCategoryId == '' ? 'selected' : '' }}>All
                                                Category</option>
                                            @foreach ($job_category as $key => $job_category)
                                                <option value="{{ $job_category->id }}"
                                                    {{ $jobCategoryId == $job_category->id ? 'selected' : '' }}>
                                                    {{ $job_category->category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--  Select job items End-->
                                    <!-- select-Categories start -->
                                    <div class="select-Categories pt-80 pb-50">
                                        <div class="small-section-tittle2">
                                            <h4>Job Type</h4>
                                        </div>
                                        @foreach ($job_time as $key => $job_time)
                                            <label class="container">{{ $job_time->type }}
                                                <input type="checkbox" value="{{ $job_time->id }}"
                                                    name="job_time_type_id"
                                                    @if ($jobTimeType == $job_time->id) checked @endif>
                                                <span class="checkmark"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <!-- select-Categories End -->
                                </div>

                                <!-- single three -->
                                <div class="single-listing">
                                    <!-- Range Slider Start -->
                                    <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                        <div class="small-section-tittle2">
                                            <h4>Filter Payment</h4>
                                        </div>
                                        <div class="widgets_inner">
                                            <div class="range_item">
                                                <!-- <div id="slider-range"></div> -->
                                                <input type="text" class="js-range-slider" value="" />
                                                <div class="d-flex align-items-center">
                                                    {{-- <div class="price_text">
                                                        <p>Gaji :</p>
                                                    </div> --}}
                                                    {{-- <div class="price_value d-flex justify-content-center"> --}}
                                                    <div class="text-center mt-2">
                                                        <input type="text" class="js-input-from  form-control"
                                                            name="range_start" id="amount" />

                                                        <span>to</span>

                                                        <input type="text" class="js-input-to form-control"
                                                            name="range_end" id="amount" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="mt-5 btn btn-primary btn-block">Filter</button>
                                    </aside>
                                    <!-- Range Slider End -->
                                </div>
                            </div>
                            <!-- Job Category Listing End -->
                        </div>
                        <!-- Right content -->
                        <div class="col-xl-9 col-lg-9 col-md-8">
                            <!-- Featured_job_start -->
                            <section class="featured-job-area">
                                <div class="container">
                                    <!-- Count of Job list Start -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="count-job mb-35">
                                                <span>{{ $totalJob }} Jobs found</span>
                                                <!-- Select job items start -->
                                                <div class="select-job-items">
                                                    <span>Sort by</span>
                                                    <select name="select">
                                                        <option value="">None</option>
                                                        <option value="">job list</option>
                                                        <option value="">job list</option>
                                                        <option value="">job list</option>
                                                    </select>
                                                </div>
                                                <!--  Select job items End-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Count of Job list End -->
                                    <!-- single-job-content -->
                                    <!-- single-job-content -->
                                    <!-- single-job-content -->
                                    @foreach ($jobs as $job)
                                        <div class="single-job-items mb-30">
                                            <div class="job-items">
                                                <div class="company-img">
                                                    <a href="{{ URL::to('/job-details', $job->id) }}"><img
                                                            src="{{ 'storage/' . $job->company->logo }}"
                                                            alt=" {{ $job->company->company_name }}" width="100"
                                                            height="auto"></a>
                                                </div>
                                                <div class="job-tittle job-tittle2">
                                                    <a href="{{ URL::to('/job-details', $job->id) }}">

                                                        <h4>{{ $job->title }}</h4>
                                                    </a>
                                                    <ul>
                                                        <li>{{ $job->jobcategory->category }}</li>
                                                        <li><i
                                                                class="fas fa-map-marker-alt"></i>{{ $job->job_location }}
                                                        </li>
                                                        <li>{{ number_format($job->salary) }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="items-link items-link2 f-right">
                                                <a
                                                    href="{{ URL::to('/job-details', $job->id) }}">{{ $job->jobTime->type }}</a>
                                                <span>{{ $job->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="pagination-area pb-115 text-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="single-wrap d-flex justify-content-center">
                                                        {{ $jobs->links() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Featured_job_end -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
