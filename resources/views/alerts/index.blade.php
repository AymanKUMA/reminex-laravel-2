@extends('layouts.app')

<?php $i = 1 ?>

@section('title', 'Alerts')

@section('content')

    <div class="container-md position-relative">
        <h1 style="color: var(--main-color);">Alerts</h1>
        <div class="row">
            @if (count($alerts) < 4)
                <div class="col-sm-6 p-3 d-flex justify-content-start align-items-center">
                    <a href="{{ route('alerts.create') }}" class="btn btn-success">
                        <i class="fa-solid fa-plus me-1"></i>Add alert
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
                    <th role="button" onclick="sortTable(0)" style="width: 50px"> ID <i class="fa-solid fa-sort fa-2xs"></i></th>
                    <th role="button" onclick="sortTable(1)" style="width: 120px"> Created by <i class="fa-solid fa-sort fa-2xs"></i></th>
                    <th role="button" onclick="sortTable(2)" style="width: 160px"> Updated at <i
                            class="fa-solid fa-sort fa-2xs"></i></th>
                    <th role="button" onclick="sortTable(3)" style="width: 160px"> Created at <i
                            class="fa-solid fa-sort fa-2xs"></i></th>
                    <th class="text-center" style="width: 200px">
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
                            <td>
                            @foreach ($users as $user)
                                @if ($user->id == $alert->updated_by)
                                    {{ $user->name }}
                                @endif
                            @endforeach
                            </td>
                            <td>{{ $alert->updated_at }}</td>
                            <td>{{ $alert->created_at }}</td>
                            <td class="">
                                <form method="POST" action={{ route('alerts.destroy', ['alert' => $alert->id]) }}>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success m-2" data-bs-toggle="modal"
                                            data-bs-target="#viewModal{{$i}}" style="padding: 4px 8px">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>

                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ route('alerts.edit', ['alert' => $alert->id]) }}"
                                       class="btn btn-primary m-2" style="padding:4px 8px">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>


                                    <button type="button" class="btn btn-danger m-2" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{$i}}" style="padding: 4px 8px">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="viewModal{{$i}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content text-dark">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel ">Alert {{$i}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{$alert->alert}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content  text-dark">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel ">Delete
                                                            Alert</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this alert ? <br>
                                                        This opperation cannot be undone
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel
                                                        </button>

                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
