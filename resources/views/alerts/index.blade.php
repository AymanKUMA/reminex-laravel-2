@extends('layouts.app')

{{$i = 1}}

@section('title', 'Alerts')

@section('content')

    <div class="container py-4 position-relative" aria-live="polite" aria-atomic="true" style="height: calc(100vh - 70px)">
        <h1 style="color: var(--main-color);">Alerts</h1>
        @if (count($alerts) >= 4)
            <div class="toast-container bottom-0 start-0 p-3 ">

                <!-- Then put toasts within -->
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src={{ url('images/logo_white.svg') }} class="rounded me-auto" alt="Reminex">

                        <small class="text-muted">just now</small>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Veuillez supprimer un alert pour que vous puissiez ajouter un nouveau !!
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            @if (count($alerts) < 4)
                <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
                    <a href={{ route('alerts.create') }} class="btn btn-success">
                        <i class="fa-solid fa-plus"></i>Ajouter
                    </a>
                </div>
            @else
                <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
                    <a class="btn btn-danger">
                        <i class="fa-solid fa-x"></i>Veuillez supprimer un alert
                    </a>
                </div>
            @endif
            <div class="col-sm-6 p-3 d-flex justify-content-end align-items-center">
                <label for="find" class="form-label mb-0 me-1">Search:</label>
                <input id="find" class="form-control me-2 " type="search" style="max-width: 350px"
                    placeholder="search" aria-label="Search" oninput="findInTable(this.value,'sortTab')">
            </div>

        </div>

        <table id="sortTab" class="table table-striped table-dark table-bordered nowrap rounded-3">
            <thead>
                <tr>
                    <th role="button" onclick="sortTable(0)"> ID <i class="fa-solid fa-sort fa-2xs"></i></th>
                    <th role="button" onclick="sortTable(1)"> Created by <i class="fa-solid fa-sort fa-2xs"></i></th>
                    <th role="button" onclick="sortTable(2)" style="width: 120px"> Updated at <i
                            class="fa-solid fa-sort fa-2xs"></i></th>
                    <th role="button" onclick="sortTable(3)" style="width: 120px"> Created at <i
                            class="fa-solid fa-sort fa-2xs"></i></th>
                    <th class="text-center" style="width: 150px">
                        Actions
                    </th>
                </tr>
            </thead>
            @if (count($alerts) != 0)
                <tbody>
                    @foreach ($alerts as $alert)
                        <tr>
                            <td>
                                {{$i}}
                            </td>
                            @foreach ($users as $user)
                                @if ($user->id == $alert->updated_by)
                                    <td>{{ $user->name }}</td>
                                @endif
                            @endforeach
                            <td>{{ $alert->updated_at }}</td>
                            <td>{{ $alert->created_at }}</td>
                            <td class="">
                                <a href={{ route('alerts.edit', ['alert' => $alert->id]) }}
                                    class="btn btn-primary btn-sm mx-2">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <form method="POST" action={{ route('alerts.destroy', ['alert' => $alert->id]) }}>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm mx-2">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <div style="display: none">{{$i++}}</div>
                    @endforeach
                </tbody>
            @endif
        </table>
    </div>
@endsection

