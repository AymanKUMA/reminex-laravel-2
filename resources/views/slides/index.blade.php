@extends('layouts.app')

@section('title', 'Slides')

@section('content')
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
                            <button type="button" class="button delete-colors">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </div>

                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- End of Content Wrapper -->
@endsection
