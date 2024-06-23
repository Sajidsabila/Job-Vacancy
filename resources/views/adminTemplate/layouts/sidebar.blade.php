<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('storage/' . $configuration->logo) }}" alt="{{ $configuration->company_name }}"
            class="brand-image " style="opacity: .8">
        <br>
        {{-- <span class="brand-text  font-weight-light">{{ auth()->user()->role }}</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ URL::to('/admin') }}" class="nav-link {{ Request::is('admin') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @if (auth()->user()->role == 'Admin')
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ Request::is('admin/job-category', 'admin/list-perusahaan', 'admin/user', 'admin/testimoni', 'admin/contact', 'admin/applyProcess', 'admin/configuration', 'admin/requirement', 'admin/benefit', 'admin/order') ? 'active' : '' }}">
                            <i style="font-size:20px" class="fa">&#xf0c9;</i>
                            <p>
                                System
                                <i class="right fas fa-angle-down"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/job-category') }}"
                                    class="nav-link {{ Request::is('admin/job-category') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>
                                        Category
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/list-perusahaan') }}"
                                    class="nav-link {{ Request::is('admin/list-perusahaan') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>
                                        List Perusahaan
                                    </p>
                                </a>
                            <li class="nav-item">

                                <a href="{{ URL::to('/admin/user') }}"
                                    class="nav-link {{ Request::is('admin/user') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">

                                <a href="{{ URL::to('/admin/testimoni') }}"
                                    class="nav-link {{ Request::is('admin/testimoni') ? ' active' : '' }}">
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
                                    class="nav-link {{ Request::is('admin/applyProcess') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-solid fa-briefcase"></i>
                                    <p>
                                        Apply Process
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/configuration') }}"
                                    class="nav-link {{ Request::is('admin/configuration') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Konfigurasi
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/requirement') }}"
                                    class="nav-link {{ Request::is('admin/requirement') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-check-circle"></i>
                                    <p>
                                        Requirement
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/benefit') }}"
                                    class="nav-link {{ Request::is('admin/benefit') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-thumbs-up"></i>
                                    <p>
                                        Benefit
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">

                                <a href="{{ URL::to('/admin/order') }}"
                                    class="nav-link {{ Request::is('admin/order') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        Order
                                    </p>
                                </a>
                            </li>

                        </ul>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ Request::is('admin/religion', 'admin/educationLevel', 'admin/jobTimeType') ? 'active' : '' }}">
                            <i class="fa fa-solid fa-address-book"></i>
                            <p>
                                Job Seekers
                                <i class="right fas fa-angle-down"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/religion') }}"
                                    class="nav-link {{ Request::is('admin/religion') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-star-and-crescent"></i>
                                    <p>Religion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/educationLevel') }}"
                                    class="nav-link {{ Request::is('admin/educationLevel') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>Education</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/skills') }}"
                                    class="nav-link {{ Request::is('admin/skills') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-hand-sparkles"></i>
                                    <p>Skill</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/jobTimeType') }}"
                                    class="nav-link {{ Request::is('admin/jobTimeType') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-clock"></i>
                                    <p>Job Time Type</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a href="#"
                            class="nav-link {{ Request::is('admin/trash-job-category', 'admin/trash-applyProcess', 'admin/trash-user', 'admin/trash-religion', 'admin/trash-educationLevel', 'admin/trash-job-seeker', 'admin/trash-company', 'admin/trash-jobTimeType', 'admin/trash-contact', 'admin/trash-order') ? 'active' : '' }}">
                            <i class="fa fa-solid fa-trash"></i>
                            <p>
                                Restore Data
                                <i class="right fas fa-angle-down"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-job-category') }}"
                                    class="nav-link {{ Request::is('admin/trash-job-category') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-applyProcess') }}"
                                    class="nav-link {{ Request::is('admin/trash-applyProcess') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-solid fa-briefcase"></i>
                                    <p>Apply Process</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-user') }}"
                                    class="nav-link {{ Request::is('admin/trash-user') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-religion') }}"
                                    class="nav-link {{ Request::is('admin/trash-religion') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-star-and-crescent"></i>
                                    <p>Religion</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-skill') }}"
                                    class="nav-link {{ Request::is('admin/trash-skill') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-hand-sparkles"></i>
                                    <p>Skill</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-educationLevel') }}"
                                    class="nav-link {{ Request::is('admin/trash-educationLevel') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-graduation-cap"></i>
                                    <p>Education</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-job-seeker') }}"
                                    class="nav-link {{ Request::is('admin/trash-job-seeker') ? ' active' : '' }}">
                                    <i class="nav-icon fa fa-solid fa-address-book"></i>
                                    <p>Job Seeker</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-company') }}"
                                    class="nav-link {{ Request::is('admin/trash-company') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>List Perusahaan</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-educationLevel') }}"
                        class="nav-link {{ Request::is('admin/trash-educationLevel') ? ' active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lowongan Kerja</p>
                        </a>
                </li> --}}
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-jobTimeType') }}"
                                    class="nav-link {{ Request::is('admin/trash-jobTimeType') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-clock"></i>
                                    <p>Job Time Type</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-contact') }}"
                                    class="nav-link {{ Request::is('admin/trash-contact') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-address-book"></i>
                                    <p>Contact </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/admin/trash-order') }}"
                                    class="nav-link {{ Request::is('admin/trash-order') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>Order </p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    </li>
                @endif


                @if (auth()->user()->role == 'Company')
                    <li class="nav-item">
                        <a href="{{ URL::to('/companie/lowongan-kerja') }}"
                            class="nav-link {{ Request::is('companie/lowongan-kerja') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                List Lowongan Pekerjaan
                            </p>
                        </a>
                    <li class="nav-item">
                        <a href="{{ URL::to('/companie/requirement') }}"
                            class="nav-link {{ Request::is('admin/requirement') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-check-circle"></i>
                            <p>
                                Requirement
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ URL::to('/companie/benefit') }}"
                            class="nav-link {{ Request::is('admin/benefit') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-thumbs-up"></i>
                            <p>
                                Benefit
                            </p>
                        </a>
                    </li>
                    {{-- <li class="nav-item {{ Request::is('receipt') || Request::is('report') ? ' menu-open' : '' }}">
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
                                    class="nav-link {{ Request::is('admin/trash-job-category') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>Category</p>
                                </a>
                            </li> --}}

                    {{-- <li class="nav-item">
                                <a href="{{ URL::to('/companie/lowongan-kerja') }}"
                                    class="nav-link {{ Request::is('companie/lowongan-kerja') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>
                                        List Lowongan Pekerjaan
                                    </p>
                                </a> --}}



                    <li class="nav-item {{ Request::is('receipt') || Request::is('report') ? ' menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ Request::is('/companie/job/trash-job') || Request::is('report') ? ' active' : '' }}">
                            <i class="fa fa-solid fa-trash"></i>
                            <p>
                                Restore Data
                                <i class="right fas fa-angle-down"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ URL::to('/companie/job/trash-job') }}"
                                    class="nav-link {{ Request::is('company/job/trash-job') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-list-alt"></i>
                                    <p>
                                        Trash Lowongan Kerja
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ URL::to('/companie/benefit/trash-benefit') }}"
                                    class="nav-link {{ Request::is('companie/trash-benefit') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-thumbs-up"></i>
                                    <p>
                                        Trash Benefit
                                    </p>
                                </a>
                            </li>
                @endif
                </li>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
