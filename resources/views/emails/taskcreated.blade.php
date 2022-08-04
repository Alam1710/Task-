@component('mail::message')
Hello, {{$user->name}} 

You are Create a job



Thanks,<br>
{{ config('app.name') }}
@endcomponent
