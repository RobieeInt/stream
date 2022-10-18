<!-- ======= Blog Details Section ======= -->
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">

        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

          <article class="blog-details">

            <div class="post-img">
                {{-- get image from data --}}
                <img src="{{asset('storage/blog/'.$blog->image)}}" class="img-fluid" alt="">
              {{-- <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid"> --}}
            </div>

            {{-- get data from blog --}}
            <h2 class="title">{{ $blog->title }}</h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{ $blog->author }}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">
                    {{-- created at dateformat  --}}
                    {{ $blog->created_at->format('d M Y') }}
                </time></a></li>
              </ul>
            </div><!-- End meta top -->

            <div class="content">
                <p>
                    {{-- get data from blog --}}
                    {!! $blog->content !!}
                </p>
            </div><!-- End post content -->

            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="#">Business</a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                <li><a href="#">Creative</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
            </div><!-- End meta bottom -->

          </article><!-- End blog post -->

          <div class="post-author d-flex align-items-center">
            <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
            <div>
              <h4>{{ $blog->author }}</h4>
              <div class="social-links">
                <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
              </div>
            </div>
          </div><!-- End post author -->

          @include('landing.layouts._commentBlogDetails')

        </div>

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

          <div class="sidebar ps-lg-4">

            <div class="sidebar-item search-form">
              <h3 class="sidebar-title">Search</h3>
              <form action="" class="mt-3">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->

            <div class="sidebar-item categories">
              <h3 class="sidebar-title">Categories</h3>
              <ul class="mt-3">
                <li><a href="#">General <span>(25)</span></a></li>
              </ul>
            </div><!-- End sidebar categories-->

            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Baca Juga</h3>

              <div class="mt-3">

                {{-- get recent blog from controller --}}
                {{-- @foreach ($recentBlogs as $recentBlog ) --}}
                  {{-- <img src="{{asset('storage/blog/'.$recentBlog->image)}}" alt=""> --}}

                  @foreach ($randomBlogs as $recentBlog )
                  <div class="post-item mt-3">
                      <img src="{{asset('storage/blog/'.$recentBlog->image)}}" alt="" class="flex-shrink-0">
                      <div>
                          <h4><a href="{{ route('landing.blogDetails', $recentBlog->slug) }}">
                            {{-- get recent title --}}
                                {{ $recentBlog->title }}

                            </a></h4>
                            <time datetime="2020-01-01"> {{ $recentBlog->created_at->format('d M Y') }}</time>
                        </div>
                    </div><!-- End recent post item-->
                    @endforeach
                    {{-- @endforeach --}}

              </div>

            </div><!-- End sidebar recent posts-->

            <div class="sidebar-item tags">
              <h3 class="sidebar-title">Tags</h3>
              <ul class="mt-3">
                <li><a href="#">App</a></li>
              </ul>
            </div><!-- End sidebar tags-->

          </div><!-- End Blog Sidebar -->

        </div>
      </div>

    </div>
  </section><!-- End Blog Details Section -->
