@extends('layouts.app')

@section('content')

    <form class="row d-flex justify-content-center align-items-center m-0" style="min-height: calc(100vh - 120px)"
          method="POST" action={{ route('users.update', ['user' => $user->id]) }}>
        @csrf
        @method('PUT')
        <div class="col card col-3  me-5 p-4 justify-content-center align-items-center text-bg-dark">
            <div class="row justify-content-center align-items-center mt-5">
                <div class="col col-auto py-1 d-flex align-items-center flex-column ">
                    <div class="fw-bold text-center fs-5">{{ $user->name }}</div>
                    <div class="fw-bold text-center text-muted mb-3" style="font-size: small">{{ $user->email }}
                    </div>
                    @if($user->profile_image_path)
                        <img id="edit-img-display" class="rounded-circle border border-5 border-warning mb-3"
                             style="width: 110px !important; height: 110px !important;"
                             src="{{ url('/profile_pics' .'/'. $user->profile_image_path) }}">
                    @else
                        <img id="edit-img-display" class="rounded-circle border border-5 border-warning mb-3"
                             style="width: 110px !important; height: 110px !important;"
                             src="{{ url('/images/profile.png') }}">
                    @endif
                </div>
            </div>
            <div class="row align-items-center justify-content-center pb-4">
                <input name="profile_image" type="file" hidden id="edit-image" value="" onchange="readURL(this)"
                       disabled>
            </div>
            <h6 class="text-muted p-3" style="font-size:14px;"><b>inscrit depuis</b>:
                {{ $user->created_at->toFormattedDateString() }}</h6>

        </div>
        <div class="col col-md-5">
            <div class="card">
                <div class="card-header text-center p-2">
                    {{ $user->name }}'s Profile
                </div>
                <div class="card-body p-3">
                   <div class="row row-cols-2">
                       <div class="col col-md-6 col-12 mb-3">
                           <label class="form-label">Name</label>
                           <input type="text" class="form-control" placeholder="full name" name="name"
                                  value="{{ $user->name }}" disabled>
                       </div>
                       <div class="col col-md-6 col-12 mb-3">
                           <label class="form-label">Username</label>
                           <input type="text" class="form-control" placeholder="enter a username" name="username"
                                  value="{{ $user->username }}" disabled>
                       </div>
                       <div class="col col-md-8 col-12 mb-4">
                           <label class="form-label">
                               Email
                           </label>
                           <input type="text" class="form-control" placeholder="enter an email" name="email"
                                  value="{{ $user->email }}" disabled>

                       </div>
                       <div class="col col-md-4 col-12 mb-4">
                           <label class="col form-label col-md-12 col-3">
                               Role

                           </label>
                           <select type="text" class="form-select" name="isadmin">
                               <option value="0" @if($user->isadmin ==0) selected @endif >User</option>
                               <option value="1" @if($user->isadmin ==1) selected @endif>Admin</option>
                           </select>
                       </div>
                       <div class="col col-12 form-check mb-3">
                           <input type="checkbox" class="form-check-input mx-2" value="true" name="reset">
                           <label for="" class="form-check-label">Reset Password</label>
                       </div>

                   </div>


                </div>


                <div class="card-footer d-flex justify-content-end p-3">
                    <button class="btn btn-warning profile-button ">Update Profile</button>
                </div>

            </div>
        </div>
    </form>
@endsection
