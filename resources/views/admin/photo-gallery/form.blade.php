<div class="mb-3">
    <label class="form-label" for="title">{{ __('Title') }}</label>
    <input type="text" name="title" id="title" class="form-control" value="{{old('title', $photoGallery->title ?? '')}}">
</div>
<div class="mb-3">
    <label class="form-label" for="title">{{ __('Photo') }}</label>
    <input type="file" name="image" id="image" class="form-control">
    @if(isset($photoGallery->image_path))
        <img src="{{ Storage::url($photoGallery->image_path) }}" class="mt-3" alt="Poster" style="max-width: 200px;">
    @endif
</div>