@extends('layouts/contentNavbarLayout')

@section('title', __('Edit News'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 ">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold"> {{ __('Edit News') }} </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="admin-dashboard.html">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="{{route('news.index')}}">News</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{ __('Add News') }}
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          @include('admin.news.form', ['categories' => $categories])
          <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
      </form>
      </div>
@endsection