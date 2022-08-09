@extends('layouts.app')

@section('title', 'Users')

@section('content')

    <div class="container py-4 position-relative" aria-live="polite" aria-atomic="true"
         style="height: calc(100vh - 70px)">
        <div class="toast-container bottom-0 start-0 p-3 ">

            <!-- Then put toasts within -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="{{ url('/images/logo_white.svg') }}" class="rounded me-auto" alt="Reminex">

                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Bonjour {{ Auth::user()->name }}
                </div>
            </div>
        </div>

        <div class="row">
            <h1 style="color: var(--main-color);">Users</h1>
            <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
                <label for="find" class="form-label mb-0 me-1">Search:</label>
                <input id="find" class="form-control me-2 " type="search" style="max-width: 350px"
                       placeholder="search" aria-label="Search" oninput="findInTable(this.value,'sortTab')">
            </div>
            <div class="col-sm-6 p-3 d-flex justify-content-end align-items-center">
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Add user
                </a>
            </div>


        </div>
        <table id="sortTab" class="table table-striped table-bordered table-dark">
            <thead class="rounded table-dark">
            <tr>
                <th role="button" onclick="sortTable(0)"> Name <i class="fa-solid fa-sort fa-2xs"></i></th>
                <th role="button" onclick="sortTable(1)"> Email <i class="fa-solid fa-sort fa-2xs"></i></th>
                <th role="button" onclick="sortTable(2)" style="width: 150px"> User Type <i
                        class="fa-solid fa-sort fa-2xs"></i></th>
                <th role="button" onclick="sortTable(3)" style="width: 180px"> Joined <i
                        class="fa-solid fa-sort fa-2xs"></i></th>
                <th class="text-center">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @if (isset($users) && count($users) != 0)
                @foreach ($users as $user)
                    <tr>
                        <td style="display: flex; align-items: center; justify-content:space-between;">
                            <img
                                src="{{ File::isFile('profile_pics/'.$user->profile_image_path)?url('profile_pics/'.$user->profile_image_path) : url('images/profile.png')}}"
                                alt="" width="48" height="48"
                                class="rounded-circle border border-warning border-3 m-1">
                            {{ $user->username }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->isadmin == 1 ? 'Super Admin' : 'Admin' }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="dropdown">

                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical " style="color: var(--main-color)"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="fa-solid fa-eye"></i>See profile
                                    </a>
                                </li>
                                @if ($user->isadmin == 0 && Auth::user()->isadmin == 1)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile') }}">
                                            <i class="fa-solid fa-pencil"></i> Edit User</a>
                                    </li>
                                    <li>
                                        @method('DELETE')
                                        @csrf
                                        <a class="dropdown-item text-danger"
                                           href="{{ route('users.destroy',['id'=>$user->id]) }}">
                                            <i class="fa-solid fa-trash-can"></i> Delete user
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="p-5">
                        No Data found
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
