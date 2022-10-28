<section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="slides-1 portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="{{asset('storage/reviewClient/'.$review->image)}}" alt="">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>{{ $review->name }}</h3>
            <ul>
              <li><strong>Profesi sebagai {{ $review->job }} </strong> </li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>Review Client</h2>
            <p>
                {!! $review->review !!}
            </p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Portfolio Details Section -->
