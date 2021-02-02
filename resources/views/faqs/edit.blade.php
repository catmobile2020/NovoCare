@extends('layouts.app')

@section('content')

    <h1>{{ __('Update FAQ') }}</h1>
    <form action="{{ route('faqs.update', ['faq' => $faq->id]) }}" method="POST">
        @csrf
        @method('PUT')

        @include('faqs._form')

        <button  class="btn btn-success btn-block" type="submit">{{ __('Update') }}</button>
    </form>


@endsection
