<div class="mb-3">
    <label class="form-label" for="title">{{ __('Title') }}</label>
    <input type="text" name="title" id="title" class="form-control" value="{{old('title', $videoGallery->title ?? '')}}">
</div>
<div class="mb-3">
    <label class="form-label" for="title">{{ __('Cover Photo') }}</label>
    <input type="file" name="cover_photo" id="cover_photo" class="form-control">
    @if(isset($videoGallery->cover_photo))
        <img src="{{ Storage::url($videoGallery->cover_photo) }}" class="mt-3" alt="Poster" style="max-width: 200px;">
    @endif
</div>
<div class="mb-3">
    <label class="form-label" for="video_url">{{ __('Video Url') }}</label>
    <input type="text" name="video_url" id="video_url" class="form-control" value="{{old('video_url', $videoGallery->video_url ?? '')}}">
</div>