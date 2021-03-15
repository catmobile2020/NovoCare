@extends('layouts.app')
@section('page-name', 'Post - Create')

@section('content')

    <h1>{{ __('Add New Post') }}</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('posts._form')

        <button class="btn btn-success btn-block" type="submit">{{ __('Create') }}</button>
    </form>


@endsection
