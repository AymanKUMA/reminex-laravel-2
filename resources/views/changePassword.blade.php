@extends('layouts.app')

@section('title','Change Password')

@section('content')
    <div class="container py-4">

        <div class="row justify-content-center align-items-center">
            <div class="col col-md-6 col-12">
                <span class="anchor" id="formChangePassword"></span>
                <!-- form card change password -->
                <div class="card card-outline-secondary">
                    <div class="card-header p-3 bg-dark">
                        <div style="color: var(--main-color)">
                            <i class="fa-solid fa-lock me-2 fa-lg"></i>
                            <span class="fs-5"> Change Password </span>
                        </div>
                    </div>
                    <div class="card-body p-4">

                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @error('oldPassword')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror

                        @error('confirmedNewPassword')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror

                        <form action="{{ route('updatePassword') }}" method="POST" class="row">
                            @csrf
                            <label class="col col-12 mb-3 form-label">
                                Current Password
                                    <input name="oldPassword" type="password" class="form-control"
                                           required>
                            </label>
                            <label class="col col-12 mb-3 form-label">
                                New Password
                                    <input name="newPassword" type="password" class="form-control"
                                           required>
                                <div class="col col-auto infoBox alert alert-info alert-dismissible fade show" role="alert">
                                    <div class="fw-bolder">
                                        <svg class="m-2" height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-labelledby="ErrorOutlineTitleID" style="fill: rgb(46, 107, 255); stroke: rgb(46, 107, 255); stroke-width: 0;">
                                            <title id="ErrorOutlineTitleID">ErrorOutline Icon</title>
                                            <path d="M11 15h2v2h-2v-2zm0-8h2v6h-2V7zm.99-5C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"></path>
                                        </svg>
                                        Password must be :
                                    </div>

                                    <ul>
                                        <li>between 8-20 characters</li>
                                        <li>No space</li>
                                    </ul>
                                </div>
                            </label>

                            <label class="col col-12 mb-3 form-label">
                                Confirm Password
                                    <input name="confirmedNewPassword" type="password" class="form-control"
                                           required>
                            </label>
                            <div class="col col-12">
                                <button type="submit" class="btn btn-warning float-left">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /form card change password -->
            </div>
        </div>
        <!--/col-->
        <!--/container-->
@endsection
