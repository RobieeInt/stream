<!-- ======= Why Choose Us Section ======= -->
<section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Mengapa Memilih Kami ?</h2>

      </div>

      <div class="row g-0" data-aos="fade-up" data-aos-delay="200">

        <div class="col-xl-5 img-bg" style="background-image: url('maa/assets/img/tan.jpeg')"></div>
        <div class="col-xl-7 slides  position-relative">

          <div class="slides-1 swiper">
            <div class="swiper-wrapper">

                @foreach ($chooses as $choose)
              <div class="swiper-slide">
                <div class="item">
                  <h3 class="mb-3">{{ $choose->title }}
                  </h3>
                  <h4 class="mb-3">{{ $choose->description }}</h4>
                  {{-- <p>{{ $choose->description }}</p> --}}
                </div>
              </div><!-- End slide item -->
                @endforeach

            </div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
        </div>

      </div>

    </div>
  </section><!-- End Why Choose Us Section -->
