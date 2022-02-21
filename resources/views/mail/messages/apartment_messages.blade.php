@component('mail::message')
# Description message

{{ $message->body }}

@component('mail::panel')
User name: {{ $message->name }}<br>
User email: {{ $message->mail }}
@endcomponent

@component('mail::button', ['url' => $url])
Back to messages
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
