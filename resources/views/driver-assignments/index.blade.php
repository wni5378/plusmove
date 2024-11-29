@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('driver-assignments-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('driver-assignments.create') }}" role="button" data-mdb-ripple-init title="Create New Driver Assignment">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Driver Assignment Management</h2>
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
                <th class="col-md-2 col-lg-2">Driver</th>
                <th class="col-md-3 col-lg-3">Vehicle</th>
                <th class="col-md-3 col-lg-3">Assigned By</th>
                <th class="col-md-2 col-lg-2">Date Assigned</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($driverAssignments as $key => $driverAssignment)
                <tr>
                    <td>{{ $driverAssignment->driver->name }} {{ $driverAssignment->driver->surname }}</td>
                    <td>{{ $driverAssignment->vehicle->make }} {{ $driverAssignment->vehicle->model }}</td>
                    <td>{{ $driverAssignment->user->name }}</td>
                    <td>{{ $driverAssignment->assigned_at }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('driver-assignments.show', $driverAssignment->id) }}" title="Show" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('driver-assignments-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('driver-assignments.edit', $driverAssignment->id) }}" title="Edit" data-mdb-ripple-init>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('driver-assignments-delete')
                            <form method="POST" action="{{ route('driver-assignments.destroy', $driverAssignment->id) }}" style="display:inline">
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

    {!! $driverAssignments->links('pagination::bootstrap-5') !!}

@endsection
