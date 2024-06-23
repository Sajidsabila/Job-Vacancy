  <footer>

      <!-- Footer Start-->
      <div class="footer-area footer-bg footer-padding">
          <div class="container">
              <div class="row d-flex justify-content-between">
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                      <div class="single-footer-caption mb-50">
                          <div class="single-footer-caption mb-30">
                              <div class="footer-tittle">
                                  <h4>About Us</h4>
                                  <div class="footer-pera">
                                      @php
                                          // Memecah teks berdasarkan tanda titik
                                          $sentences = preg_split(
                                              '/(?<!\w\.\w.)(?<![A-Z][a-z]\.)(?<=\.|\?)\s/',
                                              strip_tags($configuration->description),
                                          );
                                          // Mengambil kalimat pertama
                                          $firstSentence = $sentences[0] ?? '';
                                      @endphp
                                      <p>{{ $firstSentence }}</p>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>


                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                      <div class="single-footer-caption mb-50">
                          <div class="footer-tittle">
                              <h4>Contact Info</h4>
                              <ul>
                                  <li>
                                      <p>{{ $configuration->company_addres }}</p>
                                  </li>
                                  <li><a href="#">Phone : {{ $configuration->phone }}</a></li>
                                  <li><a href="#">Email : {{ $configuration->email }}</a></li>
                              </ul>
                          </div>

                      </div>
                  </div>

                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                      <div class="single-footer-caption mb-50">
                          <div class="footer-tittle">
                              <h4>Important Link</h4>
                              <ul>
                                  {{-- <li><a href="#"> View Project</a></li> --}}
                                  <li><a href="{{ URL::to('/contact') }}">Contact Us</a></li>
                                  <li><a href="#testimoni">Testimonial</a></li>
                                  <li><a href="{{ URL::to('/listing-job') }}">Find Jobs</a></li>
                                  <li><a href="{{ URL::to('/about') }}">About</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
                  {{-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                      <div class="single-footer-caption mb-50">
                          <div class="footer-tittle">
                              <h4>Newsletter</h4>
                              <div class="footer-pera footer-pera2">
                                  <p>{{ $configuration->tagline }}</p>
                              </div>
                              <!-- Form -->
                              <div class="footer-form">
                                  <div id="mc_embed_signup">
                                      <form target="_blank"
                                          action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                          method="get" class="subscribe_form relative mail_part">
                                          <input type="email" name="email" id="newsletter-form-email"
                                              placeholder="Email Address" class="placeholder hide-on-focus"
                                              onfocus="this.placeholder = ''"
                                              onblur="this.placeholder = ' Email Address '">
                                          <div class="form-icon">
                                              <button type="submit" name="submit" id="newsletter-submit"
                                                  class="email_icon newsletter-submit button-contactForm"><img
                                                      src="assets/img/icon/form.png" alt=""></button>
                                          </div>
                                          <div class="mt-10 info"></div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div> --}}
              </div>
              <!--  -->
              <div class="row footer-wejed justify-content-between">
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                      <!-- logo -->
                      <div class="footer-logo mb-20">
                          <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                      <div class="footer-tittle-bottom">
                          <span>{{ $countuser }}</span>
                          <p>Job Seeker</p>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                      <div class="footer-tittle-bottom">
                          <span>{{ $countcompany }}</span>
                          <p>Company</p>
                      </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                      <!-- Footer Bottom Tittle -->
                      <div class="footer-tittle-bottom">
                          <span>{{ $countjob }}</span>
                          <p>Vacancies Publish</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- footer-bottom area -->
      <div class="footer-bottom-area footer-bg">
          <div class="container">
              <div class="footer-border">
                  <div class="row d-flex justify-content-between align-items-center">
                      <div class="col-xl-10 col-lg-10 ">
                          <div class="footer-copy-right">
                              <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;
                                  <script>
                                      document.write(new Date().getFullYear());
                                  </script> All rights reserved | This template is made with <i
                                      class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                      target="_blank">Colorlib</a>
