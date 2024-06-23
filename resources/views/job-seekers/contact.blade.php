@extends ('landing-page.layouts.main')
@section('content')
    @include('sweetalert::alert')
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
        <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4" data-aos="fade-down" data-aos-duration="1000">
                    <div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15840.927964172803!2d110.4524767!3d-6.9819278!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708cc855dcb68f%3A0x740068fbacb464bc!2sUniversity%20of%20Semarang!5e0!3m2!1sen!2sid!4v1718032382473!5m2!1sen!2sid"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- End Google Maps -->
                </div>
                <div class="row">
                    <div class="col-12" data-aos="fade-right" data-aos-duration="1000">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8" data-aos="fade-right" data-aos-duration="1000">
                        <form class="form-contact contact_form" action="{{ URL::to('/contact') }}" method="post"
                            enctype="multipart/form-data">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button> --}}
                                </div>
                            @endif
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                            placeholder="Enter your name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email"
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="description" cols="30" rows="9" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1" data-aos="fade-left" data-aos-duration="1000">
                        @foreach ($configurations as $configuration)
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h3>{{ $configuration->company_name }}</h3>
                                    <p>{{ $configuration->company_addres }}</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                <div class="media-body">
                                    <h3>{{ $configuration->phone }}</h3>
                                    <p>Contact us!</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-email"></i></span>
                                <div class="media-body">
                                    <h3>{{ $configuration->company_addres }}</h3>
                                    <p>Send us your query anytime!</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ contact section end ================= -->
    </main>
@endsection
