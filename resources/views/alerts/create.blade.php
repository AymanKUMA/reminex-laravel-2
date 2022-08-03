@extends('layouts.app')

@section('title', 'Annonce')

@section('content')
    <!-- Content Wrapper -->
<div id="content-wrapper" class="p-3 pb-2">

    <form method="POST" action="{{ route('alerts.store') }}" class="container col col-md-6 " enctype="multipart/form-data">
        @csrf
        <h1 style="color: var(--main-color);">Alerts</h1>
        <div class="row row-cols-2 justify-content-center align-items-center">
            <div class="col col-12 mb-3">
                <label for="description" class="form-label">
                    Ecrire votre alert
                    <span style="color: red">*</span> :
                </label>
                <textarea name="alert" placeholder="Annonce" id="alert" class="form-control" rows="8" required></textarea>
            </div>

        </div>
        <div class="d-flex justify-content-end mb-3">
            <input class="button" type="submit" name="addSlide" value="ajouter">
        </div>
    </form>
</div>
@endsection
