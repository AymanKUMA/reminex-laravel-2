@extends('layouts.app')

@section('content')
    <div class="container rounded bg-white profile">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px" src="images/user.png"><span class="font-weight-bold">{{ Auth::user()->name }}</span>
                    <span class="text-black-50">{{ Auth::user()->email }}</span>
                    <span>Joined at : </span>
                    <span
                        class="text-black-50 font-weight-bold">{{ Auth::user()->created_at->toFormattedDateString() }}</span>
                </div>
            </div>
            <form class="col-md-5 border-right" method="POST" action="{{ route('updateProfile') }}">
                @csrf

                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right" style="color: var(--main-color);">Profile Settings</h4>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="toast-container bottom-0 start-0 p-3 ">
                        @if (session('success'))
                            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                    <img src="{{ url('/images/logo_white.svg') }}" class="rounded me-auto" alt="Reminex">

                                    <small class="text-muted">just now</small>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif
                    </div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif

                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Name</label><input type="text" class="form-control"
                                placeholder="full name" name="name" value="{{ Auth::user()->name }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Username</label><input type="text"
                                class="form-control" placeholder="enter a username" name="username"
                                value="{{ Auth::user()->username }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control"
                                placeholder="enter an email" name="email" value="{{ Auth::user()->email }}"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn btn-warning profile-button">Edit profile</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
