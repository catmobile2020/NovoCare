@auth
<nav class="shadow-sm navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #d9f5ff;">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ config('configurations.logo') }}" width="30" height="30" class="d-inline-block align-top" alt="{{ config('configurations.app_name') }}" title="{{ config('configurations.app_name') }}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNavDropdown">
        <ul class="navbar-nav d-flex align-items-center">
{{--            <li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">--}}
{{--                <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>--}}
{{--            </li>--}}
            <li class="nav-item {{ Route::currentRouteName() == 'posts.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('posts.index') }}">{{ __("News Feed") }}</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'faqs.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('faqs.index') }}">{{ __("FAQs") }}</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
            </li>

            @auth
                <li class="nav-item {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                    <a class="btn btn-sm btn-outline-success" href="{{ route('posts.create') }}">{{ __('Add Post') }}</a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}">
                    <a class="btn btn-sm btn-outline-success" href="{{ route('faqs.create') }}">{{ __('Add FAQ') }}</a>
                </li>
            @endauth
        </ul>

        <ul class="navbar-nav d-flex align-items-center">

            <li class="nav-item {{ Route::currentRouteName() == 'users.show' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.show', ['user' => Auth::user()->id ]) }}">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a onclick="event.preventDefault();document.getElementById('logout-form').submit()" class="nav-link" href="{{ route('login') }}">{{ __('Logout') }}</a>
                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>
</nav>
@endauth
