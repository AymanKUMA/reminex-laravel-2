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
                    <a href="add-slider.html" class="button add-colors">
                        <i class="fa-solid fa-plus"></i> Add slider
                    </a>
                </div>
            </div>
            <div class="box-divider"></div>
            <div class="box box-dark row">

                <div class="col">Welcome</div>
                <div class="col">Right</div>
                <div class="col">SUPER_ADMIN</div>
                <div class="col">2022-07-28</div>
                <div class="col ">
                    <button type="button" class="button update-colors">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button type="button" class="button delete-colors">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!-- End of Content Wrapper -->
@endsection
