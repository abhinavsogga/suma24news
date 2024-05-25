@extends('layouts/commonMaster')
@section('title', 'Pages')
@section('content')

<section class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold">Pages </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="admin-dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Pages
                    </li>
                  </ol>
                </nav>
              </div>
              <!-- button -->
              <div>
                <a href="{{ route('pages.create') }}" class="btn btn-primary me-2">Add Page</a>
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
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created on</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body -->
                          @foreach ($pages as $page)
                          <tr>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ $page->excerpt }}</td>
                            <td>
                              @switch($page->status)
                              @case('active')
                              <span class="badge bg-success badge-dot me-1">Active</span>
                              @break
                              @case('inactive')
                              <span class="badge bg-danger badge-dot me-1">Inactive</span>
                              @break
                              @endswitch
                            </td>
                            <td>{{ $page->created_at->format('Y-m-d') }}</td>
                            <td>
                              <span class="dropdown dropstart">
                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                  id="productDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                  aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                </a>
                                <span class="dropdown-menu" aria-labelledby="productDropdown1">
                                  <span class="dropdown-header">Settings</span>
                                  <a class="dropdown-item" href="{{ route('pages.edit', $page->id) }}"><i
                                      class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                      <form action="{{ route('pages.destroy', $page->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this news?')"><i class="fe fe-trash dropdown-item-icon"></i> Delete</button>
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
