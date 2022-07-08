@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @include('errors.alerts')
                        @if( !is_null($frequency) )
                            <div class="alert alert-dark" role="alert">
                                <b>Status: </b> {{ $frequency->status?'on':'of' }}
                            </div>
                        @endif
                        <form action="{{ route('user.frequency.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="frequency">Frequency</label>
                                <input type="date" name="frequency" id="frequency" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox"
                                           role="switch" id="sendWeatherToEmail" name="status" checked>
                                    <label class="form-check-label" for="sendWeatherToEmail">Stop send weather to Email</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-dark">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
