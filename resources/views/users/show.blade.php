@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-2 col-sm-12 col-md-12">
            <div class="card border-0 shadow-sm">

                <img class="card-img-top" src="{{ asset('media/no-image-user.png') }}" alt="{{ $user->name }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text text-muted">{{ $user->email }}</p>

                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-success btn-sm btn-block">{{ __('Edit') }}</a>

                </div>
            </div>
        </div>
    </div>
@endsection
