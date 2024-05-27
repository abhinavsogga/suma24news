
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
          <input type="text" name="title" value="{{old('title', $page->title ?? '')}}" class="form-control">
        </div>
          <!-- input -->
        <div class="mb-3">
          <label class="form-label" for="description">{{ __('Description') }}</label>
          <input type="hidden" id="description" name="description" value=""/>
          <div id="editor" class="mb-3">{!! old('description', $page->description ?? '') !!}</div>
        </div>
        <div class="mb-3">
                <label class="form-label" for="status">{{ __('Status') }}</label>
                <select name="status" id="status" class="form-select">
                    <option value="active" {{ old('status', $page->status ?? '') === 'active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                    <option value="inactive" {{ old('status', $page->status ?? '') === 'inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                </select>
            </div>
      </div>
    </div>
  </div>
  @section('page-script')
<script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendors/editor.js') }}"></script>
@endsection
  <script>
  // On form submission, get the content and put it in the hidden input
  document.getElementById('pageForm').onsubmit = function() {
      var content = quill.root.innerHTML;
      document.getElementById('description').value = content;
  };
</script>