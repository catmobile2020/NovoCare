@extends('layouts.app')

@section('content')

    <h1>{{ __('Add New FAQ') }}</h1>
    <form action="{{ route('faqs.store') }}" method="POST">
        @csrf

        @include('faqs._form')

        <button class="btn btn-success btn-block" type="submit">{{ __('Create') }}</button>
    </form>


@endsection
