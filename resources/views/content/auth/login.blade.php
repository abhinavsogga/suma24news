@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('content')
<section class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">

      <div class="col-lg-5 col-md-8 py-8 py-xl-0">
        <!-- Card -->
        <div class="card shadow ">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4 text-center">
              <a href="/"><img src="{{asset('assets/img/logo.png')}}" class="mb-4" alt="" width="200"></a>
              <h1 class="mb-1 fw-bold">Sign in</h1>
              <span>Don’t have an account? <a href="{{ route('register') }}" class="ms-1">Sign up</a></span>
            </div>
            <!-- Form -->
            <form method="POST" action="{{ route('login') }}">
              @csrf
              	<!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email address here"
                  required>
              </div>
              	<!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="**************"
                  required>
              </div>
              	<!-- Checkbox -->
              <div class="d-lg-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberme" name="remember">
                  <label class="form-check-label " for="rememberme">Remember me</label>
                </div>
                <div>
                  <a href="{{ route('reset-password') }}">Forgot your password?</a>
                </div>
              </div>
              <div>
                	<!-- Button -->
                  <div class="d-grid">
                <button type="submit" class="btn btn-primary ">Sign in</button>
              </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
