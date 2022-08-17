@extends('layouts.app')

@section('content')

    <form class="row d-flex justify-content-center align-items-center m-0" style="height: calc(100vh - 120px)">
        <div class="col card col-3  me-8 p-2 justify-content-center align-items-center text-bg-dark">
            <div class="row justify-content-center align-items-center mt-5">
                <div class="col col-auto py-1 d-flex align-items-center flex-column ">
                    <div class="fw-bold text-center fs-5">{{ $user->name }}</div>
                    <div class="fw-bold text-center text-muted mb-3" style="font-size: small">{{ $user->email }}
                    </div>
                    @if($user->profile_image_path)
                        <img id="edit-img-display" class="rounded-circle border border-5 border-warning mb-3"
                            style="width: 110px !important; height: 110px !important;" src="{{ url('/profile_pics' .'/'. $user->profile_image_path) }}">
                    @else
                        <img id="edit-img-display" class="rounded-circle border border-5 border-warning mb-3"
                            style="width: 110px !important; height: 110px !important;" src="{{ url('/images/profile.png') }}">
                    @endif
                    </div>
            </div>
            <div class="row align-items-center justify-content-center pb-4">
                <input name="profile_image" type="file" hidden id="edit-image" value="" onchange="readURL(this)" disabled>
            </div>
            <h6 class="text-muted p-3" style="font-size:14px;"><b>inscrit depuis</b>:
                {{ $user->created_at->toFormattedDateString() }}</h6>

        </div>
        <div class="col col-md-5">
            <div class="card ">
                <div class="card-header text-center">
                    {{ $user->name }}'s Profile
                </div>
                <div class="card-body p-4">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Name</label>
                            <input type="text" class="form-control" placeholder="full name" name="name"
                                value="{{ $user->name }}" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Username</label>
                            <input type="text" class="form-control" placeholder="enter a username" name="username"
                                value="{{ $user->username }}" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" placeholder="enter an email" name="email"
                                value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

@endsection
