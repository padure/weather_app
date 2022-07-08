@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.home') }}" class="text-black">{{ __('Dashboard') }}</a>
                    </div>

                    <div class="card-body">
                        @include('errors.alerts')
                        @include('errors.errors')
                        @if( !is_null($key) )
                            <div class="alert alert-success" role="alert">
                                <b>Your Key: </b> {{ $key->value }}
                            </div>
                        @endif
                        <form action="{{ route('admin.key.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="open_weather_key" class="form-label">Add Your New OpewWether Key</label>
                                <input type="text" name="weather_key" id="open_weather_key" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-dark btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
