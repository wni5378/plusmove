@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                @can('report-create')
                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('reports.create') }}" role="button" data-mdb-ripple-init title="Create New Report">
                        <i class="fa fa-plus"></i>
                    </a>
                @endcan
            </div>
            <h2>Report Management</h2>
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
                <th class="col-md-2 col-lg-2">Report Type</th>
                <th class="col-md-4 col-lg-4">Detail</th>
                <th class="col-md-2 col-lg-2">Created By</th>
                <th class="col-md-2 col-lg-2">Date Created</th>
                <th class="col-md-2 col-lg-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reports as $key => $report)
                <tr>
                    <td>{{ ucwords(strtolower($report->report_type)) }}</td>
                    <td>{{ $report->detail }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->created_at }}</td>
                    <td class="text-nowrap text-center">
                        <a class="btn btn-info btn-sm me-1" href="{{ route('reports.show', $report->id) }}" title="Show" data-mdb-ripple-init>
                            <i class="fa-solid fa-list"></i>
                        </a>
                        @can('report-edit')
                            <a class="btn btn-primary btn-sm me-1" href="{{ route('reports.edit', $report->id) }}" title="Edit" data-mdb-ripple-init>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        @endcan

                        @can('report-delete')
                            <form method="POST" action="{{ route('reports.destroy', $report->id) }}" style="display:inline">
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

    {!! $reports->links('pagination::bootstrap-5') !!}

@endsection
