@include('front.partials.header')
<div class="content-main">
      <div class="container">

        <h1 class="h2">Breaking News</h1>

        <div class="row">
          <div class="col-md-8">
            <div class="w-100 news-slider">
                @foreach($breakingNews as $breaking)
                    <div class="position-relative slide-items">
                        <div class="news_slide_content">
                        <img src="{{ asset('/storage/' . $breaking->image) }}" alt="Slide 1" width="700" height="400">
                        <div class="news_info">
                            <span data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">{{$breaking->category->title}}
                            </span>
                            <h2 class="h2" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{$breaking->title}}</h2>
                            <a href="{{ route('content.newsDetails', $breaking->slug) }}" data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms"
                            class="btn btn-md btn-yellow">Read More</a>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>

          <div class="col-md-4">
            <div class="live_news">
              <h2 class="h5">Live News</h2>
              <div class="news-video">
                <div id="poster-container" class="position-relative video_block">
                  <img src="{{ Storage::url($liveStreamingSettings['poster']) }}" alt="Poster" width="300" height="300" class="w-100">
                  <button id="play-button" class="play_btn"><img src="{{ asset('assets/img/icons/play_icon.svg') }}" alt="Play" width="66"
                      height="66"></button>
                </div>
                <div id="iframe-container">
                  <iframe id="live-stream" src="{{ $liveStreamingSettings['url'] ?? '' }}" allowfullscreen></iframe>
              </div>
                <h3 class="h4">{{ $liveStreamingSettings['title'] ?? '' }}</h3>
              </div>
            </div>
          </div>

        </div>
      </div>

      <hr />

      <div class="container">
        <div class="row mt-2">
          <aside class="col-lg-8 sidebar_lft">

            <div class="news_posts">
              @foreach($featuredNews as $featured)
                <div class="row gx-0 align-items-center post_items">
                  <figure class="col-md-6 mb-3 mb-md-0"><img src="{{ asset('/storage/' . $featured->image) }}"
                      alt="News" height="300" class="w-100 object-fit-cover"/></figure>
                  <div class="col-md-6 mb-3 mb-md-0">
                    <div class="news_summary">
                      <h3 class="h2"><a href="{{ route('content.newsDetails', $featured->slug) }}">{{ $featured->title }}</a></h3>
                      <p>{!! $featured->long_excerpt !!}</p>
                      <span class="post-by">By {{$featured->user->name}}</span>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </aside>
          <!-- End Sidebar Left -->

          <aside class="col-lg-4 sidebar_rht mt-0 mt-md-2">
            <h2 class="h5 text-uppercase title_h2">Latest News</h2>
            <div class="d-flex mt-4 mb-4 gap-2">
              <input type="date" id="filter_date" class="form-control">
              <button id="filter_btn" class="btn btn-md btn-yellow"> Search </button>
            </div>
            <ul id="latest_news_container" class="list-unstyled latest_news m-0">
                @include('front.components.news.list', ['newsItems' => $latestNews])
            </ul>
          </aside>

        </div>

        <hr class="my-4" />

      </div>
      <!-- End -->

      <div class="education_news">
        <div class="container">
          <h2 class="h5 text-uppercase title_h2">Education</h2>

          <div class="row news_slider">
            @foreach($educationNews as $education)
              <div class="mb-2">
                <figure class="mb-4"><img src="{{ asset('/storage/' . $education->image) }}" alt="Education" height="220" class="w-100 object-fit-cover"/></figure>
                <div class="text-center news_content">
                  <h3 class="h4 position-relative"><a href="{{ route('content.newsDetails', $education->slug) }}">{{ $education->title }}</a></h3>
                  <p>{!! $education->excerpt !!}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>

      </div>
      <!-- End Education News -->

 <!-- start Politics News -->
    @if(count($politicsNews) > 0)
        <div class="politics_news mb-5">
            <div class="container">
                <hr class="my-4">
                <h2 class="h5 text-uppercase title_h2">Politics</h2>
                <div class="row mt-2 align-items-center">
                    <aside class="col-lg-6 sidebar_lft">
                        <div class="news_posts">
                            <div class="row gx-0 align-items-center post_items">
                                <figure class="col-md-6 mb-3 mb-md-0"><img src="{{ asset('/storage/' . $politicsNews[0]->image) }}" alt="News" height="400px" class="w-100 object-fit-cover"></figure>
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="news_summary">
                                        <h3 class="h2"><a href="{{ route('content.newsDetails', $politicsNews[0]->slug) }}">{{ $politicsNews[0]->title }}</a></h3>
                                        <p>{!! $politicsNews[0]->excerpt !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- End Sidebar Left -->

                    <aside class="col-lg-3 sidebar_rht mt-0 pt-0 mt-md-2">
                        <ul class="list-unstyled latest_news m-0">
                            @include('front.components.news.list', ['newsItems' => $politicsNews->skip(1)->take(3), 'class' => 'border-0'])
                        </ul>
                    </aside>

                    <aside class="col-lg-3 sidebar_rht mt-0 mt-md-2 pt-0">
                        <ul class="list-unstyled latest_news m-0">
                            @include('front.components.news.list', ['newsItems' => $politicsNews->skip(4)->take(3), 'class' => 'border-0'])
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    @endif
    <!-- End Politics News -->

      <div class="entertainment_news bg_blue my-4">
        <div class="container">
          <h2 class="h5 text-uppercase title_h2 text-white">Entertainment</h2>

          <div class="row news_slider">
            @foreach($entertainmentNews as $entertainment)
            <div class="mb-2">
              <figure class="mb-4"><img src="{{ asset('/storage/' . $entertainment->image) }}" alt="News" height="220" class="w-100 object-fit-cover"/></figure>
              <div class="text-center news_content">
                <h3 class="h4 position-relative"><a href="{{ route('content.newsDetails', $entertainment->slug) }}">{{ $entertainment->title }}</a></h3>
                <p>
                    {!! $entertainment->excerpt !!}
                </p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      <!-- End Entertainment News -->

      <div class="section">
        <div class="container">
          <div class="row short_news">

            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
              <h2 class="h5 text-uppercase title_h2">Culture</h2>
              <ul class="list-unstyled latest_news m-0">
                @include('front.components.news.list', ['newsItems' => $cultureNews])
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
              <h2 class="h5 text-uppercase title_h2">International</h2>
              <ul class="list-unstyled latest_news m-0">
                @include('front.components.news.list', ['newsItems' => $internationalNews])
              </ul>
            </div>

            <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
              <h2 class="h5 text-uppercase title_h2">Future</h2>
              <ul class="list-unstyled latest_news m-0">
                @include('front.components.news.list', ['newsItems' => $futureNews])
              </ul>
            </div>
          </div>
        </div>

        <hr class="my-4" />

      </div>
      <!-- End Short News -->

      <div class="gallery_sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 photo_gallery mb-3 mb-md-0">
              <h2 class="h5 text-uppercase title_h2">Photo gallery</h2>
              <div class="slider-for d1">
                @foreach($photos as $photo)
                <div class="photo-items"><img src="{{ asset('storage/' . $photo->image_path) }}" alt="Photo" width="796"
                    height="420" class="w-100">
                </div>
                @endforeach
              </div>

              <div class="slider-nav mb-3 mb-md-0">
                @foreach($photos as $photo)
                  <div class="slide-thumb"><img src="{{ asset('storage/' . $photo->image_path) }}" width="148px" height="100"
                    alt="Photo thumb" class="object-fit-cover">
                  </div>
                @endforeach
              </div> 
            </div>

            <aside class="col-lg-4 sidebar_rht video-sidebar pt-0 mt-0 mt-md-2">
              <h2 class="h5 text-uppercase title_h2">Video Gallery</h2>
              <ul class="list-unstyled latest_news m-0">
                @foreach($videos as $video)
                <li class="d-flex align-items-center">

                  <figure class="position-relative">
                    <a href="{{ $video->video_url }}"><img src="{{ asset('storage/' . $video->cover_photo) }}" alt="{{ $video->title }}" width="127">
                        <button class="play_icon">
                            @include('front.components.icons.play')
                        </button>
                    </a>
                  </figure>

                  <div class="news_summary" bis_skin_checked="1">
                    <h3 class="h6">{{ $video->title }}</h3>
                  </div>
                </li>
                @endforeach
              </ul>
            </aside>

          </div>
        </div>
      </div>
    </div>
    <!-- End Main Content -->
<style>
  .latest_news figure img {
    height: 100px;
    width: 127px;
    object-fit: cover;
  }
  .object-fit-cover {
    object-fit: cover;
  }
  .news_summary a:hover {
      color: var(--black-color);
  }
  #iframe-container {
      display: none;
      width: 100%;
      max-width: 640px;
      margin: 20px auto;
  }

  iframe {
      width: 100%;
      height: 360px;
      border: none;
  }
</style>
<script>
    document.getElementById('play-button').addEventListener('click', function() {
        document.getElementById('poster-container').style.display = 'none';
        document.getElementById('iframe-container').style.display = 'block';
    });

    
</script>

@section('page-scripts')
<script>
$(document).ready(function(){
    $('.video-sidebar').magnificPopup({
      delegate: 'a', // child items selector, by clicking on it popup will open
      type: 'iframe'
    });

    $('#filter_btn').click(function() {
        const date = $('#filter_date').val();

        $.ajax({
            url: '{{ route("latest-news") }}',
            type: 'GET',
            data: { date: date },
            success: function(response) {
                $('#latest_news_container').html(response.html);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>
<script src="{{ asset('assets/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
@endsection

@include('front.partials.footer')