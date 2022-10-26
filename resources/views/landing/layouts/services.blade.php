<!-- ======= Our Services Section ======= -->
<section id="services-list" class="services-list">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Reviews</h2>

      </div>

      <div class="row gy-5">
        @foreach ($reviews as $review )
        <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
          <div class="icon flex-shrink-0"><i class="bi bi-star-fill" style="color: #f57813;"></i></div>
          <div>
            <h4 class="title"><a href="#" class="stretched-link"><strong>{{ $review->name }}</strong></a></h4>
            <h5 class="description"><strong>{{ $review->job }}</strong></h5>
            <p class="description">
                {{-- limit 50 character --}}
                {!! Str::limit($review->review, 150) !!}
            </p>
            <a href="{{ route('landing.index', $review->slug) }}" class="readmore stretched-link"><span>Selengkapnya ..</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Our Services Section -->
