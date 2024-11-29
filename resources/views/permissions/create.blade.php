@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('permissions.index') }}" role="button" data-mdb-ripple-init title="Back to Permissions">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <h2>Create Permission</h2>
            <hr class="hr hr-blurry" />
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('permissions.store') }}">
        @csrf
        <div class="row g-1">
            <div class="col">
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="name" id="name" class="form-control" required autocomplete="name">
                    <label class="form-label" for="name">Name:</label>
                </div>
            </div>
        </div>

        <div class="row g-1">
            <div class="col">
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" name="guard_name" id="guard_name" class="form-control"
                           required autocomplete="guard_name">
                    <label class="form-label" for="guard_name">Guard Name:</label>
                </div>
            </div>
        </div>

        <div class="row g-1">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3">
                    <i class="fa-solid fa-floppy-disk"></i> Submit
                </button>
            </div>
        </div>
    </form>

@endsection
