@component('mail::message')
#{{ $details['title'] }}

Your Registration Code: {{$details['code']}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent 