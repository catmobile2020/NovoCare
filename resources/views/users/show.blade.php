@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-3 col-sm-12 col-md-12">
            <div class="card border-0 shadow-sm">


                <div class="card-body">
                    <h4 class="card-title text-center">{{ $user->name }}</h4>

                    <img class="card-img-top" src="{{ asset('media/no-image-user.png') }}" alt="{{ $user->name }}">

                    <p class="card-text text-muted">{{ $user->email }}</p>
                    <p class="card-text text-muted">{{ $user->created_at->format('l, j F Y') }}</p>

                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-success btn-sm btn-block">{{ __('Edit') }}</a>

                </div>
            </div>
        </div>
    </div>
@endsection
