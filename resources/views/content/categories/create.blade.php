@extends('layouts/contentNavbarLayout')

@section('title', __('Add new Category'))

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">{{ __('Add new Category') }}</span>
</h4>
<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ __('Add new Category') }}</h5>
      </div>
      <div class="card-body">
	  	<form id="formCategory" class="mb-3" action="{{route('categories.store')}}" method="POST">
		  @csrf
          <div class="mb-3">
            <label class="form-label" for="title">{{ __('Title') }}</label>
            <input type="text" class="form-control" name="title" id="title"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="description">{{ __('Description') }}</label>
			<textarea id="description" class="form-control" name="description"></textarea>
          </div>
          <div class="mb-3">
          <label for="status" class="form-label">{{ __('Status') }}</label>
          <select class="form-select" id="status" name="status" aria-label="Status">
            <option value="1">{{ __('Active') }}</option>
            <option value="0">{{ __('Inactive') }}</option>
          </select>
        </div>
          <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection