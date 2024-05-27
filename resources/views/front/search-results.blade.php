@include('front.partials.header')
<div class="content-main">
    <div class="container">
        <h2 class="h5 text-uppercase title_h2">Search results</h2>
        <div class="row">
            @forelse($newsItems as $newsItem)
                <div class="mb-2 col-md-4">
                <figure class="mb-4">
                    <img src="{{ asset('/storage/' . $newsItem->image) }}" alt="News" height="260" class="w-100 object-fit-cover" /></figure>
                <div class="text-center news_content">
                    <h3 class="h4 position-relative">
                        <a href="{{ route('content.newsDetails', $newsItem->slug) }}">{{ $newsItem->title }}</a>
                    </h3>
                    <p>{!! $newsItem->excerpt !!}</p>
                </div>
                </div>
            @empty
                Sorry! No news found. Please try with another serach term.
            @endforelse
        </div>
    </div>
</div>
@include('front.partials.footer')