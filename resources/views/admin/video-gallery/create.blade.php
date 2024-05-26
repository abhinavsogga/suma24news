@extends('layouts/commonMaster')
@section('title', __('Add Video'))
@section('content')
<!-- Container fluid -->
<div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 ">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold"> {{ __('Add Video') }} </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{ route('video-gallery.index') }}">{{ __('Video Gallery') }} </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{ __('Add Video') }}
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
            <form action="{{ route('video-gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('admin.video-gallery.form')
                <button type="submit" class="btn btn-primary">{{ __('Add Video') }}</button>
            </form>
      </div>
@endsection