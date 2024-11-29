@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="float-end">
                <a class="btn btn-primary btn-sm mb-2" href="{{ route('delivery-schedules.index') }}" role="button" data-mdb-ripple-init title="Back to Delivery Schedules">
                    <i class="fa-solid fa-circle-left"></i>
                </a>
            </div>
            <h2>Create New Delivery Schedule</h2>
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

    <form method="POST" action="{{ route('delivery-schedules.store') }}">
        @csrf
    </form>

@endsection
