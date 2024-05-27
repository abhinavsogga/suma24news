
<!-- row -->
<div class="row">

<div class="col-lg-8 col-12">
    <!-- card -->
  <div class="card mb-4">
      <!-- card body -->
    <div class="card-body">
      <div>
          <!-- input -->
        <div class="mb-3">
          <label class="form-label">{{ __('Title') }}</label>
          <input type="text" name="title" value="{{old('title', $news->title ?? '')}}" class="form-control">
        </div>
          <!-- input -->
        <div class="mb-3">
          <label class="form-label" for="description">{{ __('Description') }}</label>
          <input type="hidden" id="description" name="description" value=""/>
          <div id="editor" class="mb-3">{!! old('description', $news->description ?? '') !!}</div>
        </div>
        <div class="mb-3">
            <!-- heading -->
          <h5 class="mb-1">{{ __('Image') }}</h5>
            <!-- input -->
            <input type="file" name="image" class="form-control"/>
            @if(isset($news->image))
                <img src="{{ Storage::url($news->image) }}" class="mt-3" alt="Poster" style="max-width: 200px;">
            @endif
        </div>
      </div>
    </div>
  </div>
  <!-- card -->
  <div class="card mb-4">
      <!-- card body -->
    <div class="card-body">
      <div>
        <!-- input -->
        <div class="mb-3">
          <div class="d-flex justify-content-between">
            <label class="form-label">{{ __('Category') }}</label>
            <a href="{{route('categories.create')}}">{{ __('Add New') }}</a>
          </div>
            <select class="form-select" name="category_id">
                <option value="">--Select Category--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $news->category_id ?? 0) == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="is_breaking" name="is_breaking" {{ old('is_breaking', $news->is_breaking ?? 0) == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="is_breaking">
                {{ __('Is Breaking News') }}
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="is_featured" name="is_featured" {{ old('is_featured', $news->is_featured ?? 0) == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">
                {{ __('Is Featured News') }}
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label" for="status">{{ __('Status') }}</label>
                <select name="status" id="status" class="form-select">
                    <option value="published" {{ old('status', $news->status ?? '') == 'published' ? 'selected' : '' }}>{{ __('Published') }}</option>
                    <option value="draft" {{ old('status', $news->status ?? '') == 'draft' ? 'selected' : '' }}>{{ __('Draft') }}</option>
                    <option value="archived" {{ old('status', $news->status ?? '') == 'archived' ? 'selected' : '' }}>{{ __('Archived') }}</option>
                </select>
            </div>
      </div>
    </div>
  </div>
   
</div>

</div>
<script>
  // On form submission, get the content and put it in the hidden input
  document.getElementById('newsForm').onsubmit = function() {
      var content = quill.root.innerHTML;
      document.getElementById('description').value = content;
  };
</script>