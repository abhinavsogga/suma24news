@extends('layouts/contentNavbarLayout')

@section('title', 'Categories')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">{{ __('Categories') }}</span>
</h4>

<div class="card">
  <h5 class="card-header">{{ __('Categories') }}</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>{{ __('Category') }}</th>
          <th>{{ __('Number of news') }}</th>
          <th>{{ __('Status') }}</th>
          <th>{{ __('Actions') }}</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      @foreach ($categories as $category)
        <tr>
          <td>{{ $category->title }}</td>
          <td>{{ $category->news->count() }}</td>
          <td><span class="badge {{ $category->status_class }} me-1">{{ $category->status_text }}</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>{{ __('Edit') }}</a>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this category?')">{{ __('Delete') }}</button>
                </form>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
