@component('mail::message')
# Invitation

Dear {{ $invitation->name }} {{ $invitation->email }},

Congratulations! You are invited as CountryHub in [**{{ config('app.name') }}**]({{ config('app.url') }})

As we are a closed community, and you must have an invitation link to register. You can register by clicking link below:

@component('mail::button', ['url' => $invitation->registration_link])
Join as Country Hub
@endcomponent

@component('mail::subcopy')
If you’re having trouble clicking the Register button, copy and paste the URL below into your web browser:
{{ $invitation->registration_link }}
@endcomponent

Thanks,
{{ config('app.name') }} Team
@endcomponent
