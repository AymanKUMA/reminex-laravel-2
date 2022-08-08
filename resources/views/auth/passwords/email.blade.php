@extends('layouts.app')

@section('content')
<div class="container" style="height: 85vh; display:flex; align-items:center; justify-content:center;">
    <div class="row justify-content-center" style="width: 900px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content:space-between; color: var(--main-color)"><h5>{{ __('Reset Password') }}</h5> <img src="{{url('images/icon-logo-orange.svg')}}" alt="" style="width: 50px;"> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Send Reset Link') }}
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
