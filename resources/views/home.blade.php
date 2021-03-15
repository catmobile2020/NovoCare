@extends('layouts.app')

@section('content')
    <!-- Customerly Live Chat Snippet Code -->
    <script>
        !function(){var e=window,i=document,t="customerly",n="queue",o="load",r="settings",u=e[t]=e[t]||[];if(u.t){return void u.i("[customerly] SDK already initialized. Snippet included twice.")}u.t=!0;u.loaded=!1;u.o=["event","attribute","update","show","hide","open","close"];u[n]=[];u.i=function(t){e.console&&!u.debug&&console.error&&console.error(t)};u.u=function(e){return function(){var t=Array.prototype.slice.call(arguments);return t.unshift(e),u[n].push(t),u}};u[o]=function(t){u[r]=t||{};if(u.loaded){return void u.i("[customerly] SDK already loaded. Use customerly.update to change settings.")}u.loaded=!0;var e=i.createElement("script");e.type="text/javascript",e.async=!0,e.src="https://messenger.customerly.io/launcher.js";var n=i.getElementsByTagName("script")[0];n.parentNode.insertBefore(e,n)};u.o.forEach(function(t){u[t]=u.u(t)})}();

        customerly.load({
            "app_id": "98e40537"
        });
        customerly.open();
    </script>
    <!-- End of Customerly Live Chat Snippet Code -->
    <div class="col-12">
        <div class="jumbotron shadow-sm text-center" style="background-color: #d9f5ff;">
            <img class="mx-auto d-block img-fluid" src="{{ asset('media/novo-logo.png') }}" alt="">
            <p class="lead">{{ __('Welcome text') }}</p>
        </div>
    </div>
@endsection
