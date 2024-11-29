@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
            @can('customer-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('customers.create') }}" role="button" data-mdb-ripple-init title="Create New Customer">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Customer Management</h2>
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
                <th class="col-sm-2 col-md-2 col-lg-2">Name</th>
                <th class="col-sm-1 col-md-1 col-lg-1">Phone</th>
                <th class="col-sm-3 col-md-3 col-lg-3">Email</th>
                <th class="col-sm-4 col-md-4 col-lg-4">Address</th>
                <th class="col-sm-2 col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($customers as $key => $customer)
                <tr>
                    <td class="text-nowrap">{{ $customer->name }} {{ $customer->surname }}</td>
                    <td class="text-end text-nowrap">{{ preg_replace('/(\W)+/', '', $customer->phone) }}</td>
                    <td class="text-nowrap">{{ $customer->email }}</td>
                    <td>{{ $customer->address_line_1 }}, {{ $customer->region }}, {{ $customer->postal_code }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('customers.show', $customer->id) }}" title="Show" data-mdb-ripple-init>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('package-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('customers.edit', $customer->id) }}" title="Edit" data-mdb-ripple-init>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('customer-delete')
                            <form method="POST" action="{{ route('customers.destroy', $customer->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" data-mdb-ripple-init
                                        onclick="return confirm('Are you sure you want to delete this customer?')">
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

    {!! $customers->links('pagination::bootstrap-5') !!}

@endsection
