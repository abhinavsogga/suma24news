@extends('layouts/commonMaster')
@section('title', 'News')

@section('page-styles')
<link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<section class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold">Users </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="admin-dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Users
                    </li>
                  </ol>
                </nav>
              </div>
              <!-- button -->
              <div>
                <a href="{{ route('users.create') }}" class="btn btn-primary me-2">Add User</a>
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
                      <table id="dataTableBasic" class="table mb-0 text-nowrap table-hover table-centered table-with-checkbox">
                        <!-- Table Head -->
                        <thead class="table-light">
                          <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Created At</th>
                          <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body -->
                          @foreach ($users as $user)
                          <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ ucfirst($user->role) }}</td>
                          <td>{{ $user->created_at }}</td>
                            <td>
                              <span class="dropdown dropstart">
                                <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#" role="button"
                                  id="productDropdown1" data-bs-toggle="dropdown" data-bs-offset="-20,20"
                                  aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                </a>
                                <span class="dropdown-menu" aria-labelledby="productDropdown1">
                                  <span class="dropdown-header">Settings</span>
                                  <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}"><i
                                      class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                      <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fe fe-trash dropdown-item-icon"></i> Delete</button>
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

@section('page-scripts')
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/responsive.bootstrap5.min.js') }}"></script>
@endsection
