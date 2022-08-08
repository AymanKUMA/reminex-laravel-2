@extends('layouts.app')

@section('content')

    <form class="row d-flex justify-content-center align-items-center m-0" style="height: calc(100vh - 90px)"
        method="POST" action="{{ route('updateProfile') }}" enctype="multipart/form-data">
        @csrf
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

        <div class="col card col-3  me-5 justify-content-center align-items-center text-bg-dark">
            <div class="row justify-content-center align-items-center mt-5">

                <div class="col col-auto py-1 d-flex align-items-center flex-column ">
                    <div class="fw-bold text-center fs-5">{{ ucfirst(Auth::user()->name) }}</div>
                    <div class="fw-bold text-center text-muted mb-3" style="font-size: small">{{ Auth::user()->email }}
                    </div>
                    @if(isset(Auth::user()->profile_image_path))
                    <img id="edit-img-display" class="rounded-circle border border-5 border-warning mb-3"
                    style="width: 110px !important; height: 110px !important;" src="{{ url('/profile_pics' .'/'. Auth::user()->profile_image_path) }}">
                    @else
                    <img id="edit-img-display" class="rounded-circle border border-5 border-warning mb-3"
                        style="width: 110px !important; height: 110px !important;" src="{{ url('/images/user.png') }}">
                    @endif
                    </div>
            </div>
            <div class="row align-items-center justify-content-center pb-4">
                <label for="edit-image">
                    <button type="button" class="btn btn-primary" id="edit-image-btn"
                        onclick="document.getElementById('edit-image').click()">Edit Image
                    </button>
                </label>
                <input name="profile_image" type="file" hidden id="edit-image" value="{{url('images/profile.png')}}" onchange="readURL(this)">
                <script>
                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#edit-img-display').attr('src', e.target.result);
                            };

                            reader.readAsDataURL(input.files[0]);

                        }
                    }
                </script>
            </div>
            <h6 class=" card col  col-8 p-3  text-center text-muted"
                style="font-size: 13px;   background-color:  #F1F4FD;  border: 3px #00000011 solid ;">
                l'image doit être de forme jpeg, jpg ou png.
                <br /><br /> la taille maximale est 2Mo.
            </h6>
            <h6 class="text-muted p-3" style="font-size:14px;"><b>inscrit depuis</b>:
                {{ Auth::user()->created_at->toFormattedDateString() }}</h6>

        </div>
        <div class="col col-md-5">
            <div class="card">
                <div class="card-header text-center p-3">
                    Profile Settings
                </div>
                <div class="card-body p-5">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <p class="alert alert-danger">{{ $err }}</p>
                        @endforeach
                    @endif
                    {{-- <div class="d-flex justify-content-between align-items-center mb-3"> --}}
                    {{-- <h4 class="text-right" style="color: var(--main-color);">Profile Settings</h4> --}}
                    {{-- </div> --}}
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Name</label>
                            <input type="text" class="form-control" placeholder="full name" name="name"
                                value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Username</label>
                            <input type="text" class="form-control" placeholder="enter a username" name="username"
                                value="{{ Auth::user()->username }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="text" class="form-control" placeholder="enter an email" name="email"
                                value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end p-3">
                    <button type="submit" class="btn btn-warning profile-button ">Edit profile</button>
                </div>

            </div>
        </div>

    </form>

@endsection
