<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('storage/' . $configuration->logo) }}" alt=""
                                    width="100px"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu d-flex flex-row ">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li class="{{ request()->is('/') ? 'active' : '' }}">
                                            <a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li class="{{ request()->is('listing-job') ? 'active' : '' }}">
                                            <a href="{{ url('/listing-job') }}">Find a Jobs</a>
                                        </li>
                                        <li class="{{ request()->is('about') ? 'active' : '' }}">
                                            <a href="{{ url('/about') }}">About</a>
                                        </li>
                                        <li class="submenu {{ request()->is('blog*') ? 'active' : '' }}">
                                            <a href="#">Page</a>
                                            <ul class="submenu">
                                                <li><a href="{{ url('/blog') }}">Blog</a></li>
                                                <li><a href="{{ url('/single-blog') }}">Blog Details</a></li>
                                                <li><a href="{{ url('/elements') }}">Elements</a></li>
                                                <li><a href="{{ url('/job_details') }}">Job Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="{{ request()->is('contact') ? 'active' : '' }}">
                                            <a href="{{ url('/contact') }}">Contact</a>
                                        </li>
                                    </ul>
                                </nav>


                                <!-- Header-btn -->
                                <div class="header-btn flex-end my-3 align-self-end lg-ms-5 f-right d-lg-block ml-5">
                                    @guest
                                        <a href="{{ URL::to('/register/job-seekers') }}" class="btn head-btn1">Register</a>
                                        <a href="{{ URL::to('/login-page') }}" class="btn head-btn2">Login</a>
                                    @endguest
                                    @auth
                                        @if (auth()->user()->role == 'User')
                                            <a class="btn btn-primary" href="{{ URL::to('/profile') }}" role="button"><i
                                                    class="fa-solid fa-user"></i>
                                                {{ auth()->user()->email }}
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
</header>
