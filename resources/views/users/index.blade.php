@extends('layouts.app')

@section('title', 'Slides')

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
            @if(isset($users) && count($users)!=0)
                @foreach($users as $user)
                    <tr>
                        <td>
                            <img src="https://github.com/mdo.png" alt="" width="48" height="48"
                                 class="rounded-circle border border-warning border-3 m-1">
                            {{ $user->username }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->isadmin == 1 ? "Super Admin" : "Admin" }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="dropdown">

                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical " style="color: var(--main-color)"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-eye"></i>See profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-pencil"></i> Edit User</a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-danger" href="#">
                                        <i class="fa-solid fa-trash-can"></i> Delete user
                                    </a>
                                </li>
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


        {{--        <table id="sortTab" class="table table-striped table-dark table-bordered nowrap rounded-3">--}}
        {{--            <thead>--}}
        {{--                <tr>--}}
        {{--                    <th role="button" onclick="sortTable(0)"> Titre <i class="fa-solid fa-sort fa-2xs"></i></th>--}}
        {{--                    <th role="button" onclick="sortTable(1)" style="width: 140px"> Image Position <i--}}
        {{--                            class="fa-solid fa-sort fa-2xs"></i></th>--}}
        {{--                    <th role="button" onclick="sortTable(2)" style="width: 180px">last Update <i--}}
        {{--                            class="fa-solid fa-sort fa-2xs"></i></th>--}}
        {{--                    <th role="button" onclick="sortTable(3)"> Update by <i class="fa-solid fa-sort fa-2xs"></i></th>--}}
        {{--                    <th role="button" onclick="sortTable(4)" style="width: 180px"> Create at <i--}}
        {{--                            class="fa-solid fa-sort fa-2xs"></i></th>--}}
        {{--                    <th role="button" onclick="sortTable(5)"> Create by <i class="fa-solid fa-sort fa-2xs"></i></th>--}}
        {{--                    <th class="text-center" style="width: 120px">--}}
        {{--                        Actions--}}
        {{--                    </th>--}}
        {{--                </tr>--}}
        {{--            </thead>--}}
        {{--            <tbody>--}}
        {{--                @if (count($slides) != 0)--}}
        {{--                    @foreach ($slides as $slide)--}}
        {{--                        <tr>--}}
        {{--                            <td>{{ $slide->title }}</td>--}}
        {{--                            <td>{{ $slide->layout }}</td>--}}

        {{--                            <td>{{ $slide->updated_at }}</td>--}}
        {{--                            @foreach ($users as $user)--}}
        {{--                                @if ($user->id == $slide->updated_by)--}}
        {{--                                    <td class="col">{{ $user->name }}</td>--}}
        {{--                                @endif--}}
        {{--                            @endforeach--}}

        {{--                            <td>{{ $slide->created_at }}</td>--}}

        {{--                            @foreach ($users as $user)--}}
        {{--                                @if ($user->id == $slide->updated_by)--}}
        {{--                                    <td class="col">{{ $user->name }}</td>--}}
        {{--                                @endif--}}
        {{--                            @endforeach--}}

        {{--                            <td>--}}

        {{--                                <form class="" method="POST"--}}
        {{--                                    action={{ route('users.destroy', ['user' => $user->id]) }}>--}}
        {{--                                    <a href={{ route('users.edit', ['user' => $user->id]) }}--}}
        {{--                                        class="btn btn-primary btn-sm--}}
        {{--                                   mx-2">--}}
        {{--                                        <i class="fa-solid fa-pencil"></i>--}}
        {{--                                    </a>--}}
        {{--                                    @method('DELETE')--}}
        {{--                                    @csrf--}}
        {{--                                    <button class="btn btn-danger btn-sm mx-2">--}}
        {{--                                        <i class="fa-solid fa-trash-can"></i>--}}
        {{--                                    </button>--}}
        {{--                                </form>--}}
        {{--                            </td>--}}

        {{--                        </tr>--}}
        {{--                    @endforeach--}}
        {{--                @endif--}}
        {{--            </tbody>--}}
        {{--        </table>--}}
    </div>
@endsection
