 <!-- ======= Recent Blog Posts Section ======= -->
 <section id="recent-posts" class="recent-posts">
    <div class="container" data-aos="fade-up">




      <div class="section-header">
        <h2>Recent Blog Posts</h2>
      </div>

      <div class="row gy-5">
          @foreach ($blogs as $blog )

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
             <div class="post-box">
            <div class="post-img"><img src="{{asset('storage/blog/'.$blog->image)}}" class="img-fluid" alt=""></div>
            <div class="meta">
              <span class="post-date">
                {{-- format datetime  --}}
                {{ $blog->created_at->format('d M Y') }}
              </span>
              <span class="post-author"> / {{ $blog->author }}</span>
            </div>
            <h3 class="post-title">{{ $blog->title }}</h3>
            {{-- limit 50 character --}}
            <p class="post-excerpt">{!! Str::limit($blog->content, 150) !!}</p>
            <a href="{{ route('landing.blogDetails', $blog->slug) }}" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
        @endforeach
    </div>


    </div>
  </section><!-- End Recent Blog Posts Section -->
