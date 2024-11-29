@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('customers.index') }}" role="button" data-mdb-ripple-init title="Back to Customers">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            </div>
            <h2>Create New Customer</h2>
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

    <form method="POST" action="{{ route('customers.store') }}">
        @csrf
        <!-- Name and Surname -->
        <div class="row g-4">
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="name" id="name" class="form-control" required autocomplete="name">
                    <label class="form-label" for="name">Name:</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="surname" id="surname" class="form-control" required autocomplete="surname">
                    <label class="form-label" for="surname">Surname:</label>
                </div>
            </div>
        </div>

        <!-- Email and Phone -->
        <div class="row g-4">
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="email" name="email" id="email" class="form-control" required autocomplete="email">
                    <label class="form-label" for="email">Email:</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="phone" id="phone" class="form-control" required autocomplete="phone">
                    <label class="form-label" for="phone">Phone:</label>
                </div>
            </div>
        </div>

        <!-- Address and Suburb -->
        <div class="row g-4">
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="address_line_1" id="address_line_1" class="form-control"
                           required autocomplete="address_line_1">
                    <label class="form-label" for="address_line_1">Address:</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="address_line_2" id="address_line_2" class="form-control"
                           required autocomplete="address_line_2">
                    <label class="form-label" for="address_line_2">Suburb:</label>
                </div>
            </div>
        </div>

        <!-- Province and Country -->
        <div class="row g-4">
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="region" id="region" class="form-control"
                           required autocomplete="region">
                    <label class="form-label" for="region">Province:</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="country" id="country" class="form-control"
                           required autocomplete="country">
                    <label class="form-label" for="country">Country:</label>
                </div>
            </div>
        </div>

        <!-- Postal Code -->
        <div class="row g-4">
            <div class="col-12 col-md-6 mb-2 mb-md-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="postal_code" id="postal_code" class="form-control"
                           required autocomplete="postal_code">
                    <label class="form-label" for="postal_code">Post Code:</label>
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="row g-1">
            <div class="col">
                <input type="hidden" name="roles[]" value="User">
                <input type="hidden" name="roles[]" value="Customer">
                <button type="submit" class="btn btn-primary btn-sm mt-2 mb-3">
                    <i class="fa-solid fa-floppy-disk"></i> Submit
                </button>
            </div>
        </div>
    </form>

@endsection
