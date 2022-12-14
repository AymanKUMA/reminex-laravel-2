@extends('layouts.app')

@section('title', 'Slides')
<?php $i = 0; ?>
@section('content')
<div class="m-auto">

    <div class="row">
        <h1 style="color: var(--main-color);">Slides</h1>
        <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
            <a href="{{ route('slides.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"></i> Add slider
            </a>
        </div>
        <div class="col-sm-6 p-3 d-flex justify-content-end align-items-center">
            <label for="find" class="form-label mb-0 me-1">Search:</label>
            <input id="find" class="form-control me-2 " type="search" style="max-width: 350px"
                   placeholder="search" aria-label="Search" oninput="findInTable(this.value,'sortTab')">
        </div>
    </div>
    <div class="table-responsive">
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
                <th class="text-center" style="width: 180px">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @if (count($slides) != 0)
                @foreach ($slides as $slide)
                    <tr>
                        <td>{{ $slide->title }}</td>
                        <td>{{ $slide->layout }}</td>

                        <td>{{ $slide->updated_at }}</td>
                        <td class="col">
                            @foreach ($users as $user)
                                @if ($user->id == $slide->updated_by)
                                    {{ $user->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $slide->created_at }}</td>
                        <td class="col">
                            @foreach ($users as $user)
                                @if ($user->id == $slide->created_by)
                                    {{ $user->name }}
                                @endif
                            @endforeach
                        </td>

                        <td>
                            <form class="" method="POST"
                                  action="{{ route('slides.show', ['slide' => $slide->id]) }}">
                                <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal"
                                        data-bs-target="#viewModal{{ $i }}" style="padding: 4px 8px">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                @if (Auth::user()->isadmin == 1 || Auth::user()->id == $slide->created_by)
                                    <a href="{{ route('slides.edit', ['slide' => $slide->id]) }}"
                                       class="btn btn-primary mx-2" style="padding: 4px 8px">
                                        <i class="fa-solid fa-pencil "></i>
                                    </a>
                                    @method('DELETE')
                                    @csrf
                                    <button type="button" class="btn btn-danger m-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$i}}" style="padding: 4px 8px">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content  text-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel ">Delete
                                                        Slide</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this Slide ? <br>
                                                    This opperation cannot be undone
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel
                                                    </button>

                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="viewModal{{ $i }}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                    <div class="modal-content text-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel ">
                                                {{ $slide->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="imagecontainer"
                                                 style="background-image: url({{ url('slides_images/' . $slide->image_path) }}); ">
                                                @if($slide->layout == "right")
                                                    <div class="textcontainer">
                                                        <div class="content">
                                                            <h4>{{$slide->title}}</h4>
                                                            <h5>{{$slide->subtitle}}</h5>
                                                            <p style="font-size: 10px">{{$slide->description}}</p>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="textcontainer second">
                                                        <div class="content">
                                                            <h4>{{$slide->title}}</h4>
                                                            <h5>{{$slide->subtitle}}</h5>
                                                            <p style="font-size: 10px">{{$slide->description}}</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                        <?php $i++; ?>
                @endforeach
            @else
                <tr>
                    <td colspan="7" class="p-5">
                        No Data found
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
