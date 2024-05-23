@extends('layouts/contentNavbarLayout')

@section('title', 'Settings')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('settings.update') }}">
                        @csrf
                        @method('POST')

                        @foreach ($settings as $key => $setting)
                            <div class="form-group row">
                                <label for="{{ $key }}" class="col-md-4 col-form-label text-md-right">{{ $setting['title'] }}</label>

                                <div class="col-md-6">
                                    @if (is_array($setting['value']) || is_object($setting['value']))
                                        @foreach ($setting['value'] as $subKey => $subValue)
                                            <div class="form-group row">
                                                <label for="{{ $key . '_' . $subKey }}" class="col-md-4 col-form-label text-md-right">{{ $subKey }}</label>
                                                <div class="col-md-8">
                                                    <input id="{{ $key . '_' . $subKey }}" type="text" class="form-control @error('value.' . $subKey) is-invalid @enderror" name="value[{{ $subKey }}]" value="{{ $subValue }}" required autocomplete="{{ $key . '_' . $subKey }}">
                                                    @error('value.' . $subKey)
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <input id="{{ $key }}" type="text" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ $setting['value'] }}" required autocomplete="{{ $key }}">
                                        @error('value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    @endif
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
