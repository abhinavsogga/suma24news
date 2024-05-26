@extends('layouts/contentNavbarLayout')

@section('title', __('Add News'))

@section('page-script')
<script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/vendors/editor.js') }}"></script>
<script src="{{ asset('assets/libs/tagify/tagify.min.js') }}"></script>
@endsection

@section('page-style')
<link href="asset('assets/libs/tagify/tagify.css') }}" rel="stylesheet">
@endsection

@section('content')
<!-- Container fluid -->
<div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 ">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold"> Add News </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{ route('news.index') }}">News </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Add News
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <form id="newsForm" method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
        @method('POST')
          @csrf
          @include('admin.news.form')
          <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
      </form>
      </div>
@endsection