@extends('layouts.app')

@section('title', 'Users')

@section('content')


        <div class="row">
            <h1 style="color: var(--main-color);">Users</h1>
            <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
                <label for="find" class="form-label mb-0 me-1">Search:</label>
                <input id="find" class="form-control me-2 " type="search" style="max-width: 350px"
                    placeholder="search" aria-label="Search" oninput="findInTable(this.value,'sortTab')">
            </div>
            @if(Auth::user()->isadmin == 1)
                <div class="col-sm-6 p-3 d-flex justify-content-end align-items-center">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> Add user
                    </a>
                </div>
            @endif
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
                                <img src="{{ File::isFile('profile_pics/' . $user->profile_image_path) ? url('profile_pics/' . $user->profile_image_path) : url('images/profile.png') }}"
                                    alt="" width="48" height="48"
                                    class="rounded-circle border border-warning border-3 m-1">
                                {{ $user->username }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->isadmin == 1 ? 'Super Admin' : 'User' }}</td>
                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                            <td class="dropdown">

                            <div role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical " style="color: var(--main-color)"></i>
                            </div>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('users.show',['user'=>$user->id]) }}">
                                        <i class="fa-solid fa-eye"></i>See profile
                                    </a>
                                </li>
                                @if ($user->isadmin == 0 && Auth::user()->isadmin == 1)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('users.edit',['user'=>$user->id]) }}">
                                            <i class="fa-solid fa-pencil"></i> Edit User</a>
                                    </li>
                                    <li>
                                        <form method="post" action="{{ route('users.destroy',['user'=>$user->id]) }}">
                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fa-solid fa-trash-can"></i> Delete user
                                            </button>
                                        </form>

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
@endsection
