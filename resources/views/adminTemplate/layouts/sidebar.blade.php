<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ URL::to('/admin') }}" class="nav-link {{ Request::is('/') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                </li>
                <li class="nav-item">
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/charts/flot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/inline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/uplot.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uPlot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/icons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/buttons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/sliders.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/modals.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/navbar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/timeline.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/ribbons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (auth()->user()->role == 'Admin')
                    <li class="nav-item">
                        <a href="{{ URL::to('/admin/job-category') }}"
                            class="nav-link {{ Request::is('category') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Category
                            </p>
                        </a>
                    <li class="nav-item">
                        <a href="{{ URL::to('/admin/list-perusahaan') }}"
                            class="nav-link {{ Request::is('category') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                List Perusahaan
                            </p>
                        </a>
                    <li class="nav-item">

                        <a href="{{ URL::to('/admin/user') }}"
                            class="nav-link {{ Request::is('user') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a href="{{ URL::to('/admin/testimoni') }}"
                            class="nav-link {{ Request::is('testimoni') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-quote-right"></i>
                            <p>
                                Testimoni
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a href="{{ URL::to('/admin/contact') }}"
                            class="nav-link {{ Request::is('admin/contact') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-address-book"></i>
                            <p>
                                Contact
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">

                        <a href="{{ URL::to('/admin/applyProcess') }}"
                            class="nav-link {{ Request::is('applyProcess') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-solid fa-briefcase"></i>
                            <p>
                                Apply Process
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ URL::to('/admin/configuration') }}"
                            class="nav-link {{ Request::is('user') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Konfigurasi
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ URL::to('/admin/requirement') }}"
                            class="nav-link {{ Request::is('user') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>
                                Requirement
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ URL::to('/admin/benefit') }}"
                            class="nav-link {{ Request::is('user') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>
                                Benefit
                            </p>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('receipt') || Request::is('report') ? ' menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('receipt') || Request::is('report') ? ' active' : '' }}">
                            <i class="fa fa-solid fa-address-book"></i>
                            <p>
                                Job Seekers
                                <i class="right fas fa-angle-down"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/religion') }}"
                                    class="nav-link {{ Request::is('receipt') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Religion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/educationLevel') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Education</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/report') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Skill</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/jobTimeType') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Job Time Type</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    </li>
                    <li class="nav-item {{ Request::is('receipt') || Request::is('report') ? ' menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('/admin/trash-job-category') || Request::is('report') ? ' active' : '' }}">
                            <i class="fa fa-solid fa-trash"></i>
                            <p>
                                Restore Data
                                <i class="right fas fa-angle-down"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-job-category') }}"
                                    class="nav-link {{ Request::is('receipt') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Job Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-applyProcess') }}"
                                    class="nav-link {{ Request::is('receipt') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Apply Process</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-user') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-religion') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Religion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-educationLevel') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Education Level</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-job-seeker') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Job Seeker</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-company') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List Perusahaan</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-educationLevel') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lowongan Kerja</p>
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-jobTimeType') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Job Time Type</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-contact') }}"
                                    class="nav-link {{ Request::is('report') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Contact </p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    </li>
                @endif


                @if (auth()->user()->role == 'Company')
                    <li class="nav-item">
                        <a href="{{ URL::to('/companie/lowongan-kerja') }}"
                            class="nav-link {{ Request::is('category') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                List Lowongan Pekerjaan
                            </p>
                        </a>
                @endif
                </li>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
