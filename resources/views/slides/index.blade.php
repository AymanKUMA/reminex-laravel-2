@extends('layouts.app')

@section('title', 'Slides')

@section('content')

    <div class="container py-4 position-relative" aria-live="polite" aria-atomic="true"
         style="height: calc(100vh - 70px)">
        <div class="toast-container bottom-0 start-0 p-3 ">

            <!-- Then put toasts within -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="/images/logo.svg" class="rounded me-auto" alt="Reminex">

                    <small class="text-muted">just now</small>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    See? Just like this.
                </div>
            </div>

            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="/images/logo.svg" class="rounded me-auto" alt="Reminex">

                    <small class="text-muted">2 seconds ago</small>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Heads up, toasts will stack automatically
                </div>
            </div>
        </div>
<<<<<<< HEAD
    </div>
    <h1 style="color: var(--main-color);">Slider</h1>
    <div class="row">
        <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
            <a href={{ route('slides.create') }} class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Ajouter
            </a>
        </div>
        <div class="col-sm-6 p-3 d-flex justify-content-end align-items-center">
            <label for="find" class="form-label mb-0 me-1">Search:</label>
            <input id="find" class="form-control me-2 " type="search" style="max-width: 350px"
                   placeholder="search" aria-label="Search" oninput="findInTable(this.value,'sortTab')">
=======

        <div class="row">
            <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
                <a href={{ route('slides.create') }} class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Add slider
                </a>
            </div>
            <div class="col-sm-6 p-3 d-flex justify-content-end align-items-center">
                <label for="find" class="form-label mb-0 me-1">Search:</label>
                <input id="find" class="form-control me-2 " type="search" style="max-width: 350px"
                       placeholder="search" aria-label="Search" oninput="findInTable(this.value,'sortTab')">
            </div>

>>>>>>> 90d156ac988f01812dbb64cf266cccf731b73f90
        </div>

        <table id="sortTab" class="table table-striped table-dark table-bordered nowrap rounded-3">
            <thead>
            <tr>
                <th role="button" onclick="sortTable(0)"> Titre <i class="fa-solid fa-sort fa-2xs"></i></th>
                <th role="button" onclick="sortTable(1)" style="width: 140px"> Image Position <i
                        class="fa-solid fa-sort fa-2xs"></i></th>
                <th role="button" onclick="sortTable(2)" style="width: 180px">last Update <i
                        class="fa-solid fa-sort fa-2xs"></i></th>
                <th role="button" onclick="sortTable(3)"> Update by <i class="fa-solid fa-sort fa-2xs"></i></th>
                <th role="button" onclick="sortTable(4)" style="width: 180px"> Create at <i
                        class="fa-solid fa-sort fa-2xs"></i></th>
                <th role="button" onclick="sortTable(5)"> Create by <i class="fa-solid fa-sort fa-2xs"></i></th>
                <th class="text-center" style="width: 120px">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
{{--            <tr>--}}
{{--                <td>Welcome</td>--}}
{{--                <td>Right</td>--}}
{{--                <td>2022-07-31</td>--}}
{{--                <td>Mehdi Moulati</td>--}}
{{--                <td>2022-07-30</td>--}}
{{--                <td>Mehdi Moulati</td>--}}
{{--                <td class="">--}}
{{--                    <button type="button" class="btn btn-primary btn-sm mx-2">--}}
{{--                        <i class="fa-solid fa-pencil"></i>--}}
{{--                    </button>--}}
{{--                    <button type="button" class="btn btn-danger btn-sm mx-2">--}}
{{--                        <i class="fa-solid fa-trash-can"></i>--}}
{{--                    </button>--}}
{{--                </td>--}}
{{--            </tr>--}}
            @if (count($slides) != 0)
                @foreach ($slides as $slide)
                    <tr>
                        <td>{{ $slide->title }}</td>
                        <td>{{ $slide->layout }}</td>

                        <td>{{ $slide->updated_at }}</td>
                        @foreach ($users as $user)
                            @if ($user->id == $slide->updated_by)
                                <td class="col">{{ $user->name }}</td>
                            @endif
                        @endforeach

                        <td>{{$slide->created_at}}</td>

                        @foreach ($users as $user)
                            @if ($user->id == $slide->updated_by)
                                <td class="col">{{ $user->name }}</td>
                            @endif
                        @endforeach

                        <td>

                            <form class="" method="POST" action={{route('slides.destroy', ['slide' => $slide->id ])}} >
                                <a href={{route('slides.edit', ['slide' => $slide->id ])}} class="btn btn-primary btn-sm
                                   mx-2">
                                <i class="fa-solid fa-pencil"></i>
                                </a>
                                @method("DELETE")
                                @csrf
                                <button class="btn btn-danger btn-sm mx-2">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>


    </div>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="p-3 pb-2">

        <form class="d-flex justify-content-center m-auto mt-5" role="search" style="max-width: 600px">
            <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
            <button class="button" type="submit" name="find">Search</button>
        </form>
        <div class="box-container">
            <div class="box-heading row">

                <div class="col">Title</div>
                <div class="col">Text position</div>
                <div class="col">Update by</div>
                <div class="col">Last Update</div>

                <div class="col">
                    <a href={{ route('slides.create') }} class="button add-colors">
                    <i class="fa-solid fa-plus"></i> Add slider
                    </a>
                </div>
            </div>
            <div class="box-divider"></div>
            @if (count($slides) != 0)
                @foreach ($slides as $slide)
                    <div class="box box-dark row">

                        <div class="col">{{ $slide->title }}</div>
                        <div class="col">{{ $slide->layout }}</div>
                        @foreach ($users as $user)
                            @if ($user->id == $slide->updated_by)
                                <div class="col">{{ $user->name }}</div>
                            @endif
                        @endforeach
                        <div class="col">{{ $slide->updated_at }}</div>
                        <div class="col ">
                            <a href={{route('slides.edit', ['slide' => $slide->id ])}} class="button update-colors">
                            <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form method="POST" action={{route('slides.destroy', ['slide' => $slide->id ])}} >
                                @method("DELETE")
                                @csrf
                                <button class="button delete-colors">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- End of Content Wrapper -->
@endsection
