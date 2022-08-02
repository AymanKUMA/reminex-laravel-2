@extends('layouts.app')

@section('title', 'Slides')

@section('content')

<div class="container py-4 position-relative" aria-live="polite" aria-atomic="true" style="height: calc(100vh - 70px)">
    <div class="toast-container bottom-0 start-0 p-3 ">

        <!-- Then put toasts within -->
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src={{url('images/logo_white.svg')}} class="rounded me-auto" alt="Reminex">

                <small class="text-muted">just now</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                        aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Bonjour {{Auth::user()->name}}.
            </div>
        </div>
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
        </div>

    </div>

    <table id="sortTab" class="table table-striped table-dark table-bordered nowrap rounded-3">
        <thead>
        <tr>
            <th role="button" onclick="sortTable(0)"> Titre <i class="fa-solid fa-sort fa-2xs"></i></th>
            <th role="button" onclick="sortTable(1)" style="width: 150px"> Image Position <i
                    class="fa-solid fa-sort fa-2xs"></i></th>
            <th role="button" onclick="sortTable(2)" style="width: 120px">last Update <i
                    class="fa-solid fa-sort fa-2xs"></i></th>
            <th role="button" onclick="sortTable(3)"> Update by <i class="fa-solid fa-sort fa-2xs"></i></th>
            <th role="button" onclick="sortTable(4)" style="width: 120px"> Create at <i
                    class="fa-solid fa-sort fa-2xs"></i></th>
            <th role="button" onclick="sortTable(5)"> Create by <i class="fa-solid fa-sort fa-2xs"></i></th>
            <th class="text-center" style="width: 150px">
                Actions
            </th>
        </tr>
        </thead>
        @if (count($slides) != 0)
        <tbody>
            @foreach ($slides as $slide)
                <tr>
                    <td>{{ $slide->title }}</td>
                    <td>{{ $slide->layout }}</td>
                    <td>{{ $slide->updated_at }}</td>
                    @foreach ($users as $user)
                        @if ($user->id == $slide->updated_by)
                            <td>{{ $user->name }}</td>
                        @endif
                    @endforeach
                    <td>{{ $slide->updated_at }}</td>
                    @foreach ($users as $user)
                        @if ($user->id == $slide->created_by)
                            <td>{{ $user->name }}</td>
                        @endif
                    @endforeach
                    <td class="">
                        <a href={{route('slides.edit', ['slide' => $slide->id ])}} class="btn btn-primary btn-sm mx-2">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form method="POST" action={{route('slides.destroy', ['slide' => $slide->id ])}} >
                            @method("DELETE")
                            @csrf
                            <button class="btn btn-danger btn-sm mx-2">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</div>
@endsection
