@component('mail::message')
# {{ $spam->title }}

{{ $spam->body }}

@component('mail::button', ['url' => 'https://localhost'])
Check out website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
