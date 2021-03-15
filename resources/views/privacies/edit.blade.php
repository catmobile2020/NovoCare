@extends('layouts.app')
@section('page-name', 'Privacy')

@section('content')

    <h1>{{ __('Update Privacy') }}</h1>
    <form action="{{ route('privacies.update', ['privacy' => $privacy->id]) }}" method="POST">
        @csrf
        @method('PUT')

        @include('privacies._form')

        <button  class="btn btn-success btn-block" type="submit">{{ __('Update') }}</button>
    </form>


@endsection
