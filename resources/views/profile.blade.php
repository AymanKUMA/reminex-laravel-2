@extends('layouts.app')

@section('content')

        <div class="row d-flex justify-content-center align-items-center m-0" style="height: calc(100vh - 90px)">

            <div class="col card col-3  me-5 justify-content-center align-items-center">
                <div class="row justify-content-center align-items-center mt-5">

                    <div class="col col-auto py-1 d-flex align-items-center flex-column ">
                        <div class="fw-bold text-center text-dark fs-5">{{ ucfirst(Auth::user()->name) }}</div>
                        <div class="fw-bold text-center text-muted mb-3" style="font-size: small">{{ Auth::user()->email }}</div>
                        <img  class="rounded-circle border border-5 border-warning mb-3" style="width: 110px !important; height: 110px !important;" src="https://github.com/mdo.png"></img>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center pb-4">
                    <label for="fileId">
                        <button type="button" class="btn btn-primary" >Upload Image</button>
                    </label>
                    <input id="fileId" value="" type="file" accept="image/png,image/jpg,image/jpeg" name="update_user_img" hidden="hidden">
                </div>
                <h6 class=" card col  col-8 p-3  text-center text-muted"
                    style="font-size: 13px;   background-color:  #F1F4FD;  border: 3px #00000011 solid ;">
                    l'image doit être de forme jpeg, jpg ou png.
                    <br/><br/> la taille maximale est 2Mo.
                </h6>
                <h6 class="text-muted p-3" style="font-size:14px;"><b>inscrit depuis</b>: {{ Auth::user()->created_at->toFormattedDateString() }}</h6>

            </div>
            <div class="col col-md-5">
                <form class="card " method="POST" action="{{ route('updateProfile')}}">
                    <div class="card-header text-center p-3">
                        Profile Settings
                    </div>
                    @csrf
                    @method('PUT')


                    <div class="card-body p-5">
                        {{--                    <div class="d-flex justify-content-between align-items-center mb-3">--}}
                        {{--                        <h4 class="text-right" style="color: var(--main-color);">Profile Settings</h4>--}}
                        {{--                    </div>--}}
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" placeholder="full name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Username</label>
                                <input type="text" class="form-control" placeholder="enter a username" value="{{ Auth::user()->username }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input type="text" class="form-control" placeholder="enter an email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end p-3">
                        <button type="submit" class="btn btn-warning profile-button ">Edit profile</button>
                    </div>

                </form>
            </div>

        </div>

@endsection
