@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('delivery-schedule-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('delivery-schedules.create') }}" role="button" data-mdb-ripple-init title="Create Delivery Schedule">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Delivery Schedule Management</h2>
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
                <th class="col-md-1 col-lg-1">Package</th>
                <th>Customer</th>
                <th>Package Status</th>
                <th>Region</th>
                <th>Assigned By</th>
                <th class="col-md-2 col-lg-2">Last Updated</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($deliverySchedules as $key => $deliverySchedule)
                @php
                    $package = $deliverySchedule->package;
                @endphp
                <tr>
                    <td>{{ $package->tracking_number }}</td>
                    <td class="text-nowrap">{{ $deliverySchedule->customer->name }} {{ $deliverySchedule->customer->surname }}</td>
                    <td>{{ ucwords(str_replace('-', ' ', $package->status)) }}</td>
                    <td>{{ $deliverySchedule->customer->address_line_2 }}</td>
                    <td class="text-nowrap">{{ $deliverySchedule->user->name }} {{ $deliverySchedule->user->surname }}</td>
                    <td>{{ $deliverySchedule->updated_at }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('delivery-schedules.show', $deliverySchedule->id) }}" title="Show" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('delivery-schedule-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('delivery-schedules.edit', $deliverySchedule->id) }}" title="Edit" data-mdb-ripple-init>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('delivery-schedule-delete')
                            <form method="POST" action="{{ route('delivery-schedules.destroy', $deliverySchedule->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" data-mdb-ripple-init
                                        onclick="return confirm('Are you sure you want to delete this delivery schedule?')">
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

    {!! $deliverySchedules->links('pagination::bootstrap-5') !!}

@endsection
