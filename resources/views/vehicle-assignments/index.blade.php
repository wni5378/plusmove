@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('vehicle-assignments-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('vehicle-assignments.create') }}" role="button" data-mdb-ripple-init title="Create New Vehicle Assignment">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Vehicle Assignment Management</h2>
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
                <th class="col-md-3 col-lg-3">Vehicle</th>
                <th class="col-md-2 col-lg-2">Driver</th>
                <th class="col-md-3 col-lg-3">Assigned By</th>
                <th class="col-md-2 col-lg-2">Date Assigned</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($vehicleAssignments as $key => $vehicleAssignment)
                <tr>
                    <td>{{ $vehicleAssignment->vehicle->make }} {{ $vehicleAssignment->vehicle->model }}</td>
                    <td>{{ $vehicleAssignment->driver->name }} {{ $vehicleAssignment->driver->surname }}</td>
                    <td>{{ $vehicleAssignment->user->name }}</td>
                    <td>{{ $vehicleAssignment->assigned_at }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('vehicle-assignments.show', $vehicleAssignment->id) }}" title="Show" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('vehicle-assignments-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('vehicle-assignments.edit', $vehicleAssignment->id) }}" title="Edit" data-mdb-ripple-init>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('vehicle-assignments-delete')
                            <form method="POST" action="{{ route('vehicle-assignments.destroy', $vehicleAssignment->id) }}" style="display:inline">
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

    {!! $vehicleAssignments->links('pagination::bootstrap-5') !!}

@endsection
