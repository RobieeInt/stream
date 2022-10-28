 <!-- ======= Our Services Section ======= -->
 <section id="services-list" class="services-list">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Our Services</h2>

        </div>

        <div class="row gy-5">
            @foreach ($tags as $tag )

            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="icon flex-shrink-0"><i class="bi bi-card-checklist" style="color: #15a04a;"></i></div>
                <div>
                    <h4 class="title"><a href="#" class="stretched-link">{{ $tag->name }}</a></h4>
                    <p class="description">{!! $tag->description !!}</p>
                </div>
            </div>
            <!-- End Service Item -->
            @endforeach



        </div>

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
