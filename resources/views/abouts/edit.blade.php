@extends('layouts.app')
@section('page-name', 'About us')
@section('content')

    <h1>{{ __('Update About of App') }}</h1>
    <form action="{{ route('abouts.update', ['about' => $about->id]) }}" method="POST">
        @csrf
        @method('PUT')

        @include('abouts._form')

        <button  class="btn btn-success btn-block" type="submit">{{ __('Update') }}</button>
    </form>


@endsection
