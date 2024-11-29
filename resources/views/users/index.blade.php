@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('user-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('users.create') }}" role="button" data-mdb-ripple-init title="Create New User">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Users Management</h2>
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
                <th class="col-sm-2 col-md-2 col-lg-2">Surname</th>
                <th>Email</th>
                <th class="col-sm-1 col-md-1 col-lg-1">Roles</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @php
                $roleColors = [
                    'admin' => 'role-admin',
                    'manager' => 'role-manager',
                    'scheduling' => 'role-scheduling',
                    'user' => 'role-user',
                    'customer' => 'role-customer'
                ];
            @endphp
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-nowrap text-center">
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge rounded-pill role {{ $roleColors[strtolower($v)] }}">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('users.show',$user->id) }}" role="button" data-mdb-ripple-init title="View">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                        @can('user-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('users.edit',$user->id) }}" role="button" data-mdb-ripple-init title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan
                        @can('user-delete')
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" data-mdb-ripple-init title="Delete"
                                 onclick="return confirm('Are you sure you want to delete this user?')">
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

    {!! $data->links('pagination::bootstrap-5') !!}

@endsection
