@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(!is_null($weather))
                        <div class="card-header">{{ __('Weather in '. env('OPENWEATHER_LOCATION')) }}</div>
                        <div class="card-body p-5 bg-dark text-white">
                            <div class="row">
                                <div class="col-md-4 text-center">
                                    <h1>{{ round($weather->main->temp) }} &#176;C</h1>
                                    <p>Feels like {{ round($weather->main->feels_like) }} &#176;C</p>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center align-items-center">
                                    {{ ucfirst($weather->weather[0]->description) }}
                                </div>
                                <div class="col-md-4 d-flex justify-content-center">
                                    <img src="http://openweathermap.org/img/wn/{{ $weather->weather[0]->icon }}@2x.png" alt="Icon">
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card-header">{{ __('Weather') }}</div>
                        <div class="card-body">
                            <p>No data</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
