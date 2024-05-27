
@forelse($newsItems as $newsItem)
    <li class="d-flex align-items-center {{ $class ?? '' }}">
        <figure><img src="{{ asset('/storage/' . $newsItem->image) }}" alt="News" width="127"/>
        </figure>
        <div class="news_summary">
        <h3 class="h6"><a href="{{ route('content.newsDetails', $newsItem->slug) }}">{{$newsItem->title}}</a></h3>
        </div>
    </li>
@empty
    <li>Oops, No news found for this date</li>
@endforelse