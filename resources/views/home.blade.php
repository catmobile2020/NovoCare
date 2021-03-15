@extends('layouts.app')

@section('page-name', 'Home')

@section('content')
    <div class="col-12">
        <div class="jumbotron shadow-sm text-center" style="background-color: #d9f5ff;">
            <img class="mx-auto d-block img-fluid" src="{{ asset('media/novo-logo.png') }}" alt="">
            <p class="lead">{{ __('Welcome text') }}</p>
        </div>
    </div>
@endsection
