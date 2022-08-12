@extends('layouts.app')

@section('title', 'Add User')

@section('content')

    <style>
        .card {
            box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
{{--    <div style="height: 10vh"></div>--}}
    <div class="container-md d-flex justify-content-center align-items-center" style="height: calc(100vh - 120px)">
        <form enctype="multipart/form-data" method="POST" action="{{ route('users.store') }}" class="card col-lg-8 col-md-10 col-12  text-bg-light">
            @csrf
            <div class="card-header bg-dark p-3" style="color: var(--main-color)">
                <div>
                    <i class="fa-solid fa-user-plus m-2 fa-lg"></i>
                    <span class="fs-5"> Add user </span>
                </div>
            </div>
            <div class="card-body px-md-5 py-4">
                <div class="container-md row">
                    <div class="col-12 mb-3">
                        <div class="row justify-content-start">
                            <div class="col col-auto">
                                <img id="edit-img-display" src={{ url('/images/profile.png') }} alt="mdo" width="100" height="100"
                                      class="rounded-circle border  border-5" alt=""
                                     style="border-color: var(--main-color) !important">
                            </div>

                            <label for="edit-image" class="col col-auto d-flex justify-content-center align-items-center" >
                                <button type="button" class="btn btn-primary"
                                        onclick="document.getElementById('edit-image').click()">Upload Image</button>
                            </label>
                            <input type="file" name="image" hidden id="edit-image" onchange="readURL(this)">
                            <script>
                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        let reader = new FileReader();

                                        reader.onload = function(e) {
                                            $('#edit-img-display').attr('src', e.target.result);
                                        };

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }


                            </script>
                        </div>

                    </div>

                    <label class="form-label mb-3 col-md-6 col-6">
                        Name <span class="text-danger">*</span>
                        <input type="text" placeholder="Name" class="form-control" name="name">
                    </label>

                    <label class="form-label mb-3 col-md-6 col-6">
                        Username <span class="text-danger">*</span>
                        <input type="text" placeholder="Username" class="form-control" name="username">
                    </label>

                    <label class="form-label mb-3 col-md-8 col-8">
                        Email <span class="text-danger">*</span>
                        <input type="email" placeholder="Email" class="form-control" name="email">
                    </label>
                    <label class="form-label mb-3 col-4">
                        Role
                        <select type="text" class="form-select" name="isadmin">
                            <option value="0" selected>User</option>
                            <option value="1">Admin</option>
                        </select>
                    </label>
                    <label class="form-label col-md-6 col-12">
                        Password <span class="text-danger">*</span>
                        <input type="password" class="form-control" name="password">
                    </label>
                    <label class="form-label col-md-6 col-12">
                        Confirm Password <span class="text-danger">*</span>
                        <input type="password" class="form-control" name="passwordConfirmation">
                    </label>
                </div>

            </div>
            <div class="card-footer d-flex justify-content-end py-3">
                <button class="btn btn-primary" type="submit" name="addUser">Save User</button>
            </div>

        </form>
    </div>

@endsection
