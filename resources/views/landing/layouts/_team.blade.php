 <!-- ======= Our Services Section ======= -->
 <section id="services-list" class="services-list">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Team</h2>

        </div>

        <!-- ======= Services Cards Section ======= -->
    <section id="services-cards" class="services-cards bg-white">
        <div class="container" data-aos="fade-up">

          <div class="row gy-4">

              @foreach ($teamprofiles as $teamprofile)
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                <div class="card-item">
                    <div class="row" >
                        <div class="col-xl-5">
                            <div class="card-bg" style="background-image: url({{asset('storage/teamProfil/'.$teamprofile->image)}});"></div>
                        </div>
                        <div class="col-xl-7 d-flex align-items-center">
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ Str::upper($teamprofile->name) }}
                                </h4>
                                <h4 class="card-title">{{ $teamprofile->job }}</h4>
                                <p class="card-text mb-3">{{ $teamprofile->job }}</p>

                                <p>
                                    {{-- description max 150 character --}}
                                    {!! Str::limit($teamprofile->description, 150) !!}
                                </p>

                                {{-- readmore --}}
                                <a href="{{ route('landing.index') }}" class="readmore stretched-link"><span></span><i class="bi bi-arrow-right"></i></a>


                                <div class="social position-absolute bottom-0">
                                    {{-- link to social media new tab --}}
                                    <a href="{{ $teamprofile->facebook }}" target="_blank"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $teamprofile->twitter }}" target="_blank"><i class="bi bi-twitter"></i></a>
                                    <a href="{{ $teamprofile->instagram }}" target="_blank"><i class="bi bi-instagram"></i></a>
                                    <a href="{{ $teamprofile->linkedin }}" target="_blank"><i class="bi bi-linkedin"></i></a>

                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Card Item -->
            @endforeach

          </div>

        </div>
      </section><!-- End Services Cards Section -->

      </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimoni Client</h2>

        </div>

        <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper-wrapper">

                @foreach ($reviews as $review )
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            {!! Str::limit($review->review, 150) !!}
                        </p>
                        <div class="profile mt-auto">
                            <img src="{{asset('storage/reviewClient/'.$review->image)}}" class="testimonial-img" alt="">
                            <h3>{{ $review->name }}</h3>
                            <h4>{{ $review->job }}</h4>
                        </div>
                        {{-- link readmore --}}
                        <a href="{{ route('landing.reviewDetails', $review->slug) }}" class="readmore stretched-link mt-2"><i class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End testimonial item -->
                @endforeach

            </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
