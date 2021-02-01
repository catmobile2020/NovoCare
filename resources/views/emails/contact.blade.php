@component('mail::message')
    Hello Admin,
    <p>
        This is a demo email for testing purposes from {{ $name }} <br>
        and hes email is: <a href="mailTo:{{ $email }}">{{$email}}</a><br>
        and hes message: {{ $comment }}<br>
        Thank You, <br>
        {{ config('app.name') }}
    </p>
@endcomponent
