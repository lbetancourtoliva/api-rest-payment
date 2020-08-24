@extends('layouts.app')

@section('content')
    <example-component></example-component>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        Review <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                                  href="{{ route('configuration.companies-list') }}">companies</a> list.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
