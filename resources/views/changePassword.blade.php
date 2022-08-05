@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <span class="anchor" id="formChangePassword"></span>
                        <!-- form card change password -->
                        <div class="card card-outline-secondary">
                            <div class="card-header">
                                <h3 class="mb-0" style="color: var(--main-color)">Change Password</h3>
                            </div>
                            <div class="card-body">

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

                                <form action="{{ route('updatePassword') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="oldPassword">Current Password</label>
                                        <input name="oldPassword" type="password" class="form-control" id="oldPassword"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="newPassword">New Password</label>
                                        <input name="newPassword" type="password" class="form-control" id="newPassword"
                                            required>
                                        <span class="form-text small text-muted">
                                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                        </span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmedNewPassword">Confirm</label>
                                        <input name="confirmedNewPassword" type="password" class="form-control"
                                            id="confirmedNewPassword" required>
                                        <span class="form-text small text-muted">
                                            To confirm, type the new password again.
                                        </span>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-warning float-right">Change</button>
                                </form>
                            </div>
                        </div>
                        <!-- /form card change password -->
                    </div>
                </div>
                <!--/col-->
            </div>
            <!--/row-->
        </div>
        <!--/container-->
    @endsection
