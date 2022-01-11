@extends('layouts.app')
@section('page-name', 'User - Edit')

@section('content')
    <form action="{{ route('users.update', ['user' => $user->id]) }}"
          enctype="multipart/form-data" method="POST"
          class="form-horizontal">

        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-4">
                <img class="img-thumbnail avatar" src="{{ asset('media/no-image-user.png') }}" alt="">
            </div>
            <div class="col-8">

                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"/>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"/>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" />
                </div>


                @component('layouts.components.errors')
                @endcomponent

                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-block" value="{{ __('Save Сhanges') }}"/>
                </div>
            </div>
        </div>

    </form>
@endsection
