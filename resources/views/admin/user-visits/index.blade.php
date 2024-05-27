@extends('layouts/commonMaster')
@section('title', 'User Visits')

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
                <h1 class="mb-0 h2 fw-bold">User Visits </h1>
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
                          <th>Most Visited Category</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body -->
                          @foreach ($visits as $visit)
                          <tr>
                          <td>{{ $visit->id }}</td>
                          <td>{{ $visit->id }}</td>
                          <td>{{ $visit->id }}</td>
                          <td>{{ $visit->id }}</td>
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
