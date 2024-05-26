@include('front.partials.header')
<div class="content-main">
    <div class="container">
        <h2 class="h5 text-uppercase title_h2">{{ $category->title }} News</h2>
        <div class="row">
            @foreach($categorynews as $news)
                <div class="mb-2 col-md-4">
                <figure class="mb-4">
                    <img src="{{ asset('/storage/' . $news->image) }}" alt="News" height="260" class="w-100 object-fit-cover" /></figure>
                <div class="text-center news_content">
                    <h3 class="h4 position-relative">
                        <a href="{{ route('content.newsDetails', $news->slug) }}">{{ $news->title }}</a>
                    </h3>
                    <p>{{ $news->excerpt }}</p>
                </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@section('page-scripts')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
		window.startTime = new Date().getTime();
	});

    window.addEventListener('beforeunload', function() {
        let endTime = new Date().getTime();
        let duration = (endTime - window.startTime) / 1000; // Convert to seconds

        fetch('/log-time-spent', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                visit_id: {{ session('visit_id') }},
                time_spent: duration
            })
        });
    });
</script>
@endsection
@include('front.partials.footer')