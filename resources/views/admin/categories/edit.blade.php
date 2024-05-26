@extends('layouts/commonMaster')

@section('title', __('Edit category'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 ">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold"> {{ __('Edit category') }} </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{ route('categories.index') }}">{{ __('Categories') }} </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{ __('Edit category') }}
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <form id="formCategory" action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
          @method('PUT')
          @include('admin.categories.form', ['category' => $category])
          <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
      </form>
      </div>
@endsection