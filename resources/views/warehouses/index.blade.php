@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('warehouse-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('warehouses.create') }}" role="button" data-mdb-ripple-init title="Create New Warehouse">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Warehouse Management</h2>
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
                <th class="col-md-2 col-lg-2">Name</th>
                <th class="col-md-2 col-lg-2">Region</th>
                <th class="col-md-6 col-lg-6">Address</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($warehouses as $key => $warehouse)
                <tr>
                    <td>{{ $warehouse->name }}</td>
                    <td>{{ $warehouse->region }}</td>
                    <td>{{ $warehouse->address }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('warehouses.show', $warehouse->id) }}" title="Show" data-mdb-ripple-init>
                            <i class="fa-solid fa-list"></i>
                        </a>
                        @can('warehouse-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('warehouses.edit', $warehouse->id) }}" title="Edit" data-mdb-ripple-init>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('warehouse-delete')
                            <form method="POST" action="{{ route('warehouses.destroy', $warehouse->id) }}" style="display:inline">
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

    {!! $warehouses->links('pagination::bootstrap-5') !!}

@endsection
