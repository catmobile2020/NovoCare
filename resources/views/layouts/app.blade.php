<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="128x128" href="{{ config('configurations.logo') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>{{ $meta_title ?? 'NovoCare'}}</title>
    @toastr_css
</head>
<body id="app">

@include('includes.header')

<main class="container py-4">
    @component('layouts.components.success')
    @endcomponent
    @yield('content')
</main>

<script src="{{ mix('js/app.js') }}"></script>

@if (Route::currentRouteName() == 'posts.edit'
    || Route::currentRouteName() == 'posts.create'
    || Route::currentRouteName() == 'posts.show'
    || Route::currentRouteName() == 'abouts.edit'
    || Route::currentRouteName() == 'privacies.edit'
    || Route::currentRouteName() == 'terms.edit'
    || Route::currentRouteName() == 'users.show')
    @include('includes.tinymce')
@endif
@jquery
@toastr_js
@toastr_render
</body>
</html>
