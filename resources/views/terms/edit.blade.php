@extends('layouts.app')
@section('page-name', 'Terms')

@section('content')

    <h1>{{ __('Update Terms of Use') }}</h1>
    <form action="{{ route('terms.update', '1') }}" method="POST">
        @csrf
        @method('PUT')

        @include('terms._form')

        <button  class="btn btn-success btn-block" type="submit">{{ __('Update') }}</button>
    </form>


@endsection
