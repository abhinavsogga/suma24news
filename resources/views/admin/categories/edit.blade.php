@extends('layouts/contentNavbarLayout')

@section('title', __('Edit category'))

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">{{ __('Edit category') }}</span>
</h4>
<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ __('Edit category') }}</h5>
      </div>
      <div class="card-body">
      <form action="{{ route('categories.update', $category->id) }}" method="POST">
			@csrf
			@method('PUT')
			@include('admin.categories.form', ['category' => $category])
          <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection