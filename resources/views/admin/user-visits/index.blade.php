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
                <h1 class="mb-0 h2 fw-bold">User Visits</h1>
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Categories Visited</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table body -->
                          @foreach ($groupedVisits as $groupVisit)
                            <tr>
                                <td>{{ optional($groupVisit->first()->user)->name ?? 'Guest' }}</td>
                                <td>{{ optional($groupVisit->first()->user)->email ?? 'N/A' }}</td>
                                <td>
                                    @foreach($groupVisit as $visit)
                                    <p class="mb-1">
                                    <span class="badge
                                        @if ($loop->first) bg-success
                                        @elseif ($loop->iteration == 2) bg-info
                                        @elseif ($loop->iteration == 3) bg-warning
                                        @else bg-secondary
                                        @endif">
                                        {{ $visit->category->title }}
                                    </span>
                                      {{ (int) $visit->total_time_spent }}s
                                    </p>
                                    @endforeach
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
