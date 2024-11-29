@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('role-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('roles.create') }}" role="button"
                       data-mdb-ripple-init title="Create New Role">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Role Management</h2>
            <hr class="hr hr-blurry"/>
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
                <th>Name</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('roles.show',$role->id) }}" role="button"
                           data-mdb-ripple-init title="View">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('role-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('roles.edit',$role->id) }}"
                               role="button" data-mdb-ripple-init title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('role-delete')
                            <form method="POST" action="{{ route('roles.destroy', $role->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" role="button" data-mdb-ripple-init
                                        title="Delete"
                                        onclick="return confirm('Are you sure that you want to delete this role?');">
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

    {!! $roles->links('pagination::bootstrap-5') !!}

@endsection
