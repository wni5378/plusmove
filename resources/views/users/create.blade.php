@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('users.index') }}" role="button" data-mdb-ripple-init title="Back to Users">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <h2>Create New User</h2>
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

    <form method="POST" action="{{ route('users.store') }}">
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
                    <input type="text" name="surname" id="surname" class="form-control" required autocomplete="surname">
                    <label class="form-label" for="surname">Surname:</label>
                </div>
            </div>
        </div>

        <div class="row g-1">
            <div class="col">
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" name="email" id="email" class="form-control" required autocomplete="email">
                    <label class="form-label" for="email">Email:</label>
                </div>
            </div>
        </div>

        <div class="row g-1">
            <div class="col">
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="password" id="password" class="form-control" required autocomplete="password">
                    <label class="form-label" for="password">Password:</label>
                </div>
            </div>
        </div>

        <div class="row g-1">
            <div class="col">
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="confirm-password" id="confirm_password" class="form-control" required autocomplete="confirm-password">
                    <label class="form-label" for="confirm_password">Confirm Password:</label>
                </div>
            </div>
        </div>

        <div class="row g-1">
            <div class="col">
                <div class="mb-4">
                    <label class="form-label" for="roles">Role:</label>
                    <select name="roles[]" id="roles" class="form-select" multiple="multiple" required autocomplete="roles[]">
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}">
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
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
