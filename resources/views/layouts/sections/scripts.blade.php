<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>

<script src="{{ asset('assets/libs/toastr/toastr.min.js') }}"></script>


<!-- Theme JS -->
<script src="{{ asset('assets/admin/js/theme.min.js') }}"></script>
<script>
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}", {timeOut: 5000})
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}", {timeOut: 5000})
        @endforeach
    @endif
</script>
@yield('vendor-script')
@yield('page-script')