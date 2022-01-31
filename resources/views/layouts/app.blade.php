<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" sizes="128x128" href="{{ config('configurations.logo') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <title>{{ $meta_title ?? config('configurations.app_name')}}</title>
</head>
<body id="app">

@include('includes.header')

<main class="container py-4 card shadow py-2">
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

</div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>
</html>
