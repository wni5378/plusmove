@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('permission-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('permissions.create') }}" role="button" data-mdb-ripple-init title="Create New Permission">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Permission Management</h2>
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
                <th class="col-md-5 col-lg-5">Name</th>
                <th class="col-md-5 col-lg-5">Guard Name</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($permissions as $key => $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('permissions.show',$permission->id) }}" role="button" data-mdb-ripple-init title="View">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('permission-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('permissions.edit',$permission->id) }}" role="button" data-mdb-ripple-init title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('permission-delete')
                            <form method="POST" action="{{ route('permissions.destroy', $permission->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" role="button"
                                        onclick="return confirm('Are you sure that you want to delete this permission?')"
                                        data-mdb-ripple-init title="Delete">
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

    {!! $permissions->links('pagination::bootstrap-5') !!}

@endsection
