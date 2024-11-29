@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('vehicle-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('vehicles.create') }}" role="button" data-mdb-ripple-init title="Create New Vehicle">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Vehicle Management</h2>
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
                <th class="col-md-2 col-lg-2">Make</th>
                <th class="col-md-2 col-lg-2">Model</th>
                <th class="col-md-2 col-lg-2">Year</th>
                <th class="col-md-2 col-lg-2">Reg. No.</th>
                <th class="col-md-2 col-lg-2">Mileage</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($vehicles as $key => $vehicle)
                <tr>
                    <td>{{ $vehicle->make }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td class="text-end">{{ $vehicle->year }}</td>
                    <td>{{ $vehicle->registration_number }}</td>
                    <td class="text-end">{{ number_format($vehicle->mileage) }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('vehicles.show', $vehicle->id) }}" title="Show" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('vehicle-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('vehicles.edit', $vehicle->id) }}" title="Edit" data-mdb-ripple-init>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('vehicle-delete')
                            <form method="POST" action="{{ route('vehicles.destroy', $vehicle->id) }}" style="display:inline">
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

    {!! $vehicles->links('pagination::bootstrap-5') !!}

@endsection
