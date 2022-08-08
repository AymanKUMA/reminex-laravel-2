@extends('layouts.app')

@section('title', 'Add User')

@section('content')

    <style>
        .card{
            box-shadow: 0 0 20px 5px rgba(0, 0, 0, 0.2);
        }

    </style>
    <div class="container d-flex justify-content-center align-items-center" style="height: calc(100vh - 80px)">
        <form method="POST" action="" class="card col-8 text-bg-light">
            <div class="card-header " style="background-color: var(--main-color)">
                <h4>
                    <i class="fa-solid fa-user-plus m-2"></i>  <span style="font-size: 18px !important">Add user</span>
                </h4>
            </div>
            <div class="card-body px-5 py-4">
                <div class="container row">
                    <div class="col-8 mb-3">
                        <img id="edit-img-display" src={{ url('/images/profile.png') }} alt="mdo" width="100" height="100"
                             class="rounded-circle border  border-5 me-3" alt="" style="border-color: var(--main-color) !important">
                        <label for="edit-image">
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('edit-image').click()">Upload Image</button>
                        </label>
                        <input type="file" name="image" hidden id="edit-image" onchange="readURL(this)">
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

                    <label class="form-label mb-3 col-12">
                        Name <span class="text-danger">*</span>
                        <input type="text" placeholder="Name" class="form-control" name="name">
                    </label>

                    <label class="form-label mb-3 col-8">
                        Username <span class="text-danger">*</span>
                        <input type="text" placeholder="Username" class="form-control" name="username">
                    </label>
                    <label class="form-label mb-3 col-3">
                        Role
                        <select type="text" class="form-select" name="isadmin">
                            <option value="0" selected>User</option>
                            <option value="1" selected>Admin</option>
                        </select>
                    </label>

                    <label class="form-label mb-3 col-12">
                        Email <span class="text-danger">*</span>
                        <input type="email" placeholder="Email" class="form-control" name="email">
                    </label>
                    <label class="form-label col-12">
                        Password <span class="text-danger">*</span>
                        <input type="password" class="form-control" name="password">
                    </label>
                </div>

            </div>
            <div class="card-footer d-flex justify-content-end py-3">
                <button class="btn btn-primary" type="submit" name="addUser">Save User</button>
            </div>

        </form>
    </div>

@endsection
