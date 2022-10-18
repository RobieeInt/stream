  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    @foreach ($landings as $landing )

    <div class="container">
      <div class="row">
        <div class="col-xl-4">
          <h2 data-aos="fade-up">
            {{-- get data from landings table --}}
            {{ $landing->hero_title }}
          </h2>
          <blockquote data-aos="fade-up" data-aos-delay="100">
            {!! $landing->hero_description !!}
          </blockquote>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Get Started</a>
            <a href="{{ $landing->hero_video_link }}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>

        </div>
      </div>
    </div>

    @endforeach
  </section><!-- End Hero Section -->

  {{-- CKEDIT about --}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('about');
</script>
