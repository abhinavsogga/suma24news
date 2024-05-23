@extends('layouts/contentNavbarLayout')

@section('title', 'Categories')

@section('content')
<section class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold">{{ __('Categories') }}</h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="admin-dashboard.html">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    {{ __('Categories') }}
                    </li>
                  </ol>
                </nav>
              </div>
              <!-- button -->
              <div>
                <a href="{{ route('categories.create') }}" class="btn btn-primary me-2">{{ __('Add Category') }}</a>
              </div>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Card -->
            <div class="card rounded-3">
              <div class="table-responsive border-0">
                      <!-- Table -->
                      <table class="table mb-0 text-nowrap table-hover table-centered table-with-checkbox">
                        <!-- Table Head -->
                        <thead class="table-light">
                          <tr>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Number of news') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body -->
                          @foreach ($categories as $category)
                          <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->news->count() }}</td>
                            <td><span class="badge {{ $category->status_class }} me-1">{{ $category->status_text }}</span></td>
                            <td>
                              <span class="dropdown dropstart">
                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                  id="productDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                  aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                </a>
                                <span class="dropdown-menu" aria-labelledby="productDropdown1">
                                  <span class="dropdown-header">Settings</span>
                                  <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}"><i
                                      class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                      <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this category?')"><i class="fe fe-trash dropdown-item-icon"></i>{{ __('Delete') }}</button>
                                    </form>
                                </span>
                              </span>
                            </td>
                          </tr>
                          @endforeach

                        </tbody>
                      </table>
                    </div>
            </div>
          </div>
        </div>
      </section>
@endsection
