@extends('layouts/commonMaster')
@section('title', __('Add News'))
@section('content')
<!-- Container fluid -->
<div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 ">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold"> {{ __('Add Photo') }} </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="{{ route('photo-gallery.index') }}">{{ __('Photo Gallery') }} </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{ __('Add Photo') }}
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
            <form action="{{ route('photo-gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.photo-gallery.form')
                <button type="submit" class="btn btn-primary">{{ __('Add Photo') }}</button>
            </form>
      </div>
@endsection