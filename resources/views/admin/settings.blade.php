@extends('layouts/contentNavbarLayout')

@section('title', 'Settings')

@section('content')
<section class="container-fluid p-4">
                    <div class="row">
                        <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-12">
                            <div class="border-bottom pb-3 mb-3">
                                <div class="mb-2 mb-lg-0">
                                    <h1 class="mb-1 h2 fw-bold">General Setting</h1>
                                    <!-- Breadcrumb -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="/">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Settings</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row -->
                    <div class="row">
                        <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card mb-4">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h4 class="mb-0">Live streaming settings</h4>
                                </div>
                                <!-- Card body -->
                                <div class="card-body">
                                    <!-- Form -->
                                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 mb-4">
                                            <label for="siteName" class="form-label">Title</label>
                                            <input class="form-control" id="title" name="settings[live_streaming][title]" placeholder="Title" type="text" required="" value="{{ $liveStreamingSettings['title'] ?? '' }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="siteName" class="form-label">Poster</label>
                                            <div class="input-group mb-1">
                                                <input type="file" class="form-control" name="settings[live_streaming][poster]" id="inputLogo">
                                                <label class="input-group-text" for="inputLogo">Upload</label>
                                            </div>
                                            @if(!empty($liveStreamingSettings['poster']))
                                                <img src="{{ Storage::url($liveStreamingSettings['poster']) }}" alt="Poster" style="max-width: 200px;">
                                            @endif
                                        </div>
                                        <div class="mb-3 mb-4">
                                            <label for="siteName" class="form-label">
                                                Live streaming url
                                            </label>
                                            <input class="form-control" name="settings[live_streaming][url]" id="live_streaming_url" placeholder="Enter Url" type="text" required="" value="{{ $liveStreamingSettings['url'] ?? '' }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update Settings</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
