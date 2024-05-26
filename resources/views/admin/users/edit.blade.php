@extends('layouts/contentNavbarLayout')

@section('title', __('Edit User'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid p-4">
        <div class="row ">
          <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 ">
              <div class="mb-2 mb-lg-0">
                <h1 class="mb-0 h2 fw-bold"> {{ __('Edit User') }} </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{route('users.index')}}">Users</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{ __('Edit User') }}
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          @include('admin.users.form')
          <button type="submit" class="btn btn-primary">{{ __('Update User') }}</button>
      </form>
      </div>
@endsection