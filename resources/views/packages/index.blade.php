@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('customer-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('packages.create') }}" role="button" data-mdb-ripple-init title="Create New Package">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Package Management</h2>
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
                <th>Tracking Number</th>
                <th>Customer</th>
                <th>Weight</th>
                <th>Dimensions</th>
                <th>Status</th>
                <th>Date Updated</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($packages as $key => $package)
                <tr>
                    <td>{{ $package->tracking_number }}</td>
                    <td>{{ $package->customer->name }} {{ $package->customer->surname }}</td>
                    <td class="text-end">{{ number_format($package->weight) }}</td>
                    <td class="text-end">{{ $package->dimension_x }} X {{ $package->dimension_y }} X {{ $package->dimension_z }}</td>
                    <td>{{ $package->status }}</td>
                    <td>{{ $package->updated_at }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('packages.show', $package->id) }}" title="Show" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('package-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('packages.edit', $package->id) }}" title="Edit" data-mdb-ripple-init>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('package-delete')
                            <form method="POST" action="{{ route('packages.destroy', $package->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" data-mdb-ripple-init
                                        onclick="return confirm('Are you sure you want to delete this package?')">
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

    {!! $packages->links('pagination::bootstrap-5') !!}

@endsection
