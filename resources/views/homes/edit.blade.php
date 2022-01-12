@extends('layouts.app')
@section('page-name', 'Home Page')

@section('content')

    <h1>{{ __('Update Home Page') }}</h1>
    <form action="{{ route('homes.update', '1') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('homes._form')

        <button  class="btn btn-success btn-block" type="submit">{{ __('Update') }}</button>
    </form>


@endsection
