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
            <h4 class="title"><a href="#" class="stretched-link">{{ $review->name }}</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
        </div>
        @endforeach
      </div>

    </div>
  </section><!-- End Our Services Section -->
