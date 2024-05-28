</main>

  <footer class="footer">
    <div class="footer_top">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="footer-logo">
              <img src="{{ asset('assets/img/logo_white.png') }}" alt="Suma 24 News" width="150" height="auto">
            </div>
          </div>

        <div class="col-sm-9 text-left text-md-end">
            <ul class="list-unstyled d-inline-flex social_icons">
                @foreach($socialMedia as $platform => $url)
                    @if($url != '')
                    <li>
                        <a href="{{ $url }}" target="_blank" rel="nofollow">
                            {!! file_get_contents(asset('assets/img/icons/'. $platform .'.svg')) !!}
                        </a>
                    </li>
                    @endif
                @endforeach
            </ul>
          </div>

          <div class="col-12">
            <ul class="list-unstyled footer_nav">
              @foreach($navItems as $slug => $item)
                <li><a href="{{ $item['url'] }}">{{ $item['label'] }}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="footer_bottom text-center">
      <div class="container">
        <span>@2024, LLC All rights reserved.</span>
      </div>
    </div>

  </footer>

  <!-- Jquery, Popper, Bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

  <script src="{{ asset('assets/js/main.js') }}"></script>
  @yield('page-scripts')
</body>

</html>