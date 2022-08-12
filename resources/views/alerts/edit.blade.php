@extends('layouts.app')

@section('title', 'Modifier')

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper">
        <form method="POST" action="{{ route('alerts.update', ['alert' => $alert->id]) }}" class="container col col-md-6"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 style="color: var(--main-color);"><i class="fa-solid fa-bell me-3"></i>Alerts</h1>
        <div class="row row-cols-2 justify-content-center align-items-center">
            <div class="col col-12 mb-3">
                <label for="description" class="form-label">
                    Ecrire votre alert
                    <span style="color: red">*</span> :
                </label>
                <textarea name="alert" placeholder="Annonce" id="alert" class="form-control" rows="8"
                          required>{{ $alert->alert }}</textarea>
            </div>

        </div>
        <div class="d-flex justify-content-end mb-3">
            <input class="button" type="submit" name="addSlide" value="Modifier">
        </div>
        </form>
    </div>
@endsection
