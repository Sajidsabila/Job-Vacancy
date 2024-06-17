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
                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="12px">
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
                                     <option value="">All Category</option>
                                     @foreach ($job_category as $category)
                                         <option value="{{ $category->id }}"
                                             {{ request('job_category_id') == $category->id ? 'selected' : '' }}>
                                             {{ $category->category }}
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
                                 @php
                                     $selectedJobTimes = request('job_time_type_id', $job_time->pluck('id')->toArray());
                                 @endphp
                                 @foreach ($job_time as $time)
                                     <label class="container">
                                         {{ $time->type }}
                                         <input type="checkbox" value="{{ $time->id }}" name="job_time_type_id[]"
                                             {{ in_array($time->id, (array) $selectedJobTimes) ? 'checked' : '' }}>
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
                                         <div class="select-job-items d-flex flex-row gap-2">
                                             <div class="form-group m-3">
                                                 <input type="text" class="form-control" name="keyword"
                                                     id="keyword" placeholder="Masukkan kata kunci ....."
                                                     value="{{ request('keyword') }}" style="height: 50px;">
                                             </div>
                                             <div class="form-group m-3">
                                                 <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <!-- Count of Job list End -->
                             <!-- single-job-content -->
                             <!-- single-job-content -->
                             <!-- single-job-content -->
                             @foreach ($jobs as $job)
                                 <!-- single-job-content -->
                                 <div class="single-job-link" data-url="{{ URL::to('/job-details', $job->slug) }}"
                                     data-aos="zoom-in" data-aos-duration="1000">
                                     <div class="single-job-items mb-30">
                                         <div class="job-items">
                                             <div class="company-img company-img-details">
                                                 <img src="{{ asset('storage/' . $job->company->logo) }}"
                                                     alt="Logo {{ $job->company->company_name }}" width="60"
                                                     height="auto">
                                             </div>
                                             <div class="job-tittle">
                                                 <a href="{{ URL::to('/job-details', $job->slug) }}">
                                                     <h4>{{ $job->title }}</h4>
                                                 </a>
                                                 <ul>
                                                     <li>{{ $job->company->company_name }}</li>
                                                     <li><i class="fas fa-map-marker-alt"></i>{{ $job->job_location }}
                                                     </li>
                                                     <li>{{ number_format($job->salary) }}</li>
                                                 </ul>
                                             </div>
                                         </div>
                                         <div class="items-link f-right">
                                             <a
                                                 href="{{ URL::to('/job-details', $job->slug) }}">{{ $job->jobTime->type }}</a>
                                             <span>{{ $job->created_at->diffForHumans() }}</span>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                             <div class="pagination-area pb-115 text-center">
                                 <div class="container">
                                     <div class="row">
                                         <div class="col-xl-12">
                                             <div class="single-wrap d-flex justify-content-center">
                                                 {{-- Memastikan $jobs adalah instance dari LengthAwarePaginator atau Paginator --}}
                                                 @if ($jobs instanceof \Illuminate\Pagination\LengthAwarePaginator || $jobs instanceof \Illuminate\Pagination\Paginator)
                                                     {{ $jobs->links() }}
                                                 @endif
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

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         var jobLinks = document.querySelectorAll('.single-job-link');

         jobLinks.forEach(function(link) {
             link.addEventListener('click', function() {
                 window.location.href = link.getAttribute('data-url');
             });
         });

         // Clear search keyword after form submission
         var form = document.getElementById('filterForm');
         form.addEventListener('submit', function() {
             var keywordInput = document.getElementById('keyword');
             keywordInput.value = '';
         });
     });
 </script>
