@extends('layouts.app')

@section('title','Page not Found')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: calc(100vh - 80px)">
        <div class="col col-5 d-flex justify-content-center align-items-center flex-column">
            <p class="text-center mt-4"
               style="color: var(--main-color); font-size: 70px;font-family: Roboto,sans-serif">ERROR 404
            </p>
            <h4 class="text-center mb-2"> Page Not Found</h4>
            <p class=" text-center mb-4 text-muted " style="width: 500px">
                We are very sorry for the inconvenience.it looks like you're trying to access a page that been deleted
                or never even existed
            </p>
            <div class="text-center mt-3">
                <a class="button" href="{{ route('welcomePage') }}">Back To HomePage</a>
            </div>
        </div>
        <div class="col col-5">
            <div class="row justify-content-center">
                <img src="{{ url('images/page-not-found.svg')}}" style="width: 600px" alt="">

            </div>
        </div>
    </div>
@endsection
