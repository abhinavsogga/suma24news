@include('front.partials.header')
<div class="content-main">
      <div>
        <div class="container">
          <!-- <h2 class="h5 text-uppercase title_h2">{{ $page->title }}</h2> -->
          <div class="row">
            {!! $page->description !!}
          </div>
        </div>

      </div>
      <!-- End Education News -->
</div>
    <!-- End Main Content -->

@include('front.partials.footer')