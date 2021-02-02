@extends('layouts.app')

@section('content')
    <div class="card-columns row d-flex justify-content-center">
        @forelse ($users as $user)
            <div class="card col-lg-2 col-sm-4 col-md-4 border-1 mr-1 ml-1 shadow-sm">
                <img class="card-img pt-2 rounded" src="{{ asset('media/no-image-user.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text d-flex justify-content-between align-items-center">
                        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="card-link">{{ $user->name }}</a>
                    </p>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ __('No users yet!') }}
                    </h5>
                </div>
            </div>
        @endforelse
    </div>

    {{ $users->links() }}

@endsection
