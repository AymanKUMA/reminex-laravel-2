@extends('layouts.app')

{{ $i = 1 }}

@section('title', 'Alerts')

@section('content')

    <div class="container-md py-4 position-relative" aria-live="polite" aria-atomic="true"
         style="height: calc(100vh - 70px)">
        <h1 style="color: var(--main-color);">Alerts</h1>

        <div class="toast-container bottom-0 start-0 p-3 ">
            @if (count($alerts) >= 4)
                <!-- Then put toasts within -->
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="{{ url('images/logo_white.svg') }}" class="rounded me-auto" alt="Reminex">

                        <small class="text-muted">just now</small>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Veuillez supprimer un alert pour que vous puissiez ajouter un nouveau !!
                    </div>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="{{ url('/images/logo_white.svg') }}" class="rounded me-auto" alt="Reminex">

                        <small class="text-muted">just now</small>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session()->get('message') }}
                    </div>
                </div>
            @endif
        </div>


        <div class="row">
            @if (count($alerts) < 4)
                <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
                    <a href="{{ route('alerts.create') }}" class="btn btn-success">
                        <i class="fa-solid fa-plus me-1"></i>Ajouter
                    </a>
                </div>
            @else
                <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
                    <a class="btn btn-danger">
                        <i class="fa-solid fa-x"></i>&nbsp;&nbsp; Veuillez supprimer un alert
                    </a>
                </div>
            @endif
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
                    <th role="button" onclick="sortTable(0)"> ID <i class="fa-solid fa-sort fa-2xs"></i></th>
                    <th role="button" onclick="sortTable(1)"> Created by <i class="fa-solid fa-sort fa-2xs"></i></th>
                    <th role="button" onclick="sortTable(2)" style="width: 180px"> Updated at <i
                            class="fa-solid fa-sort fa-2xs"></i></th>
                    <th role="button" onclick="sortTable(3)" style="width: 180px"> Created at <i
                            class="fa-solid fa-sort fa-2xs"></i></th>
                    <th class="text-center" style="width: 150px">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                @if ( isset($alerts) && count($alerts) != 0)

                    @foreach ($alerts as $alert)
                        <tr>
                            <td>
                                {{ $i }}
                            </td>
                            @foreach ($users as $user)
                                @if ($user->id == $alert->updated_by)
                                    <td>{{ $user->name }}</td>
                                @endif
                            @endforeach
                            <td>{{ $alert->updated_at }}</td>
                            <td>{{ $alert->created_at }}</td>
                            <td class="">
                                <form method="POST" action={{ route('alerts.destroy', ['alert' => $alert->id]) }}>
                                    <a href="{{ route('alerts.edit', ['alert' => $alert->id]) }}"
                                       class="btn btn-primary m-2">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger  m-2"
                                            onclick="return confirm('Do you really want to delete this record ? this opperation cannot be undone')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <div style="display: none">{{ $i++ }}</div>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="p-5">
                            No Data found
                        </td>
                    </tr>

                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection