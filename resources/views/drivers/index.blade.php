@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('driver-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('drivers.create') }}" role="button" data-mdb-ripple-init title="Create New Driver">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Driver Management</h2>
            <hr class="hr hr-blurry" />
        </div>
    </div>

    @session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
    @endsession

    <div class="table-responsive-lg">

        <table class="table table-bordered table-striped table-hover w-100">
            <thead>
            <tr>
                <th class="col-md-4 col-lg-4">Name</th>
                <th class="col-md-4 col-lg-4">Surname</th>
                <th class="col-md-2 col-lg-2">ID Number</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($drivers as $key => $driver)
                <tr>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->surname }}</td>
                    <td>{{ $driver->id_number }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('drivers.show',$driver->id) }}" title="Show" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('driver-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('drivers.edit',$driver->id) }}" title="Edit" data-mdb-ripple-init>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('driver-delete')
                            <form method="POST" action="{{ route('drivers.destroy', $driver->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" data-mdb-ripple-init>
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    {!! $drivers->links('pagination::bootstrap-5') !!}

@endsection
