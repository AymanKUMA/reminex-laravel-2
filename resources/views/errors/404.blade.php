@extends('layouts.app')

@section('title','Page not Found')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-column" style="height: calc(100vh - 80px)">
            <img src="{{ url('images/page-not-found.svg')}}" width="350" alt="">
        <h2 class="text-center mt-4 mb-2"> Sorry</h2>
        <h5 class=" text-center mb-4 text-muted"> We can't Find the Page that you're looking for</h5>
        <a class="btn btn-primary" href="{{ route('welcomePage') }}">Return To Home Page</a>
    </div>
@endsection
