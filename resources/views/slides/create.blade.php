@extends('layouts.app')

@section('title', 'Ajouter un slide')

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="container-md col col-lg-8 col-12">
        <form method="POST" action="{{route('slides.store')}}" class="card text-bg-light " enctype="multipart/form-data">
            @csrf
            <div class="card-header bg-dark p-3" style="color: var(--main-color);">
                <i class="fa-solid fa-plus fa-lg mx-2"></i>
                <span class="fs-5">Slides </span>
            </div>
            <div class="card-body p-4 row row-cols-2 justify-content-around align-items-center">
                <div class="col col-md-5 col-12 my-2">
                    <label class="form-label">
                        Image <span style="color: red">* </span> :
                    </label>
                    <div class="imageContainer m-auto rounded-4" style="max-height: 300px; overflow-y:hidden">
                        <img src="#" id="chosenImg" class="img-fluid rounded-4" alt="">

                        <label for="image" id="add-image" role="button"
                               class="d-flex flex-column justify-content-center align-items-center">

                            <img role="button" src="{{ url('/images/add-image.svg') }}" alt="add-image">
                            <span>Importer un image</span>

                        </label>

                        <input type="file" name="image" placeholder="Titre" id="image" class="form-control" hidden
                               onchange="readURL(this)" required>
                    </div>
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#chosenImg').attr('src', e.target.result);
                                };

                                reader.readAsDataURL(input.files[0]);

                            }
                        }
                    </script>


                </div>
                <div class="col col-md-5 col-12 my-2" >
                    <div class="row row-cols-2">
                        <div class="col col-md-6 col-12 mb-3">
                            <label for="title" class="form-label">Titre : <span style="color: red">*</span> </label>
                            <input type="text" name="title" placeholder="Titre" id="titre" class="form-control" required>
                        </div>
                        <div class="col col-md-6 col-12 mb-3">
                            <label for="subtitle" class="form-label">Sous-titre : <span style="color: red">*</span></label>
                            <input type="text" name="subtitle" placeholder="Sous-Titre" id="subtitre" class="form-control"
                                   required>
                        </div>
                        <div class="col col-12 mb-3">
                            <label for="description" class="form-label">
                                Description
                                <span style="color: red">*</span> :
                            </label>
                            <textarea name="description" placeholder="Description" id="description" class="form-control" rows="2" maxlength="400" required></textarea>
                        </div>
                        <div class="col col-12 mb-3">
                            <label class="form-label d-inline-block mb-3">Position de texte :</label>
                            <div class="row row-cols-2">

                                <div class="col ">
                                    <div class="row justify-content-center">
                                        <img src={{ url('/images/left.svg') }} alt="gauche" style="width: 200px" alt="">
                                    </div>
                                    <div class="row mt-3">
                                        <label class="form-check-label" style="text-align: center">
                                            <span>Gauche</span>
                                            <input type="radio" name="layout" class="form-check-input"
                                                   value="left">
                                        </label>
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="row justify-content-center">
                                        <img src={{ url('/images/right.svg') }} alt="right" style="width: 200px" alt="">
                                    </div>
                                    <div class="row mt-3">
                                        <label style="text-align: center" class="form-check-label">
                                            <span>Droite</span>
                                            <input type="radio" name="layout" class="form-check-input"
                                                   value="right" checked>
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <input class="button" type="submit" name="addSlide" value="Save">
                </div>
            </div>
        </form>
    </div>
@endsection
