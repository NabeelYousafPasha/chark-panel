@component('mail::message')
Hello! {{ $user->full_name ?? '' }},

You have received a new comment on your patient <b>{{ $patient->alias }}</b>'s assessment held at <b>{{ $assessment->created_at }}</b>.

```
{{ substr($comment->comment, 0, 50) }}...
```

Please check the portal for a complete treatment plan from Dr. Charkhandeh regarding your patient’s treatment.

@component('mail::button', ['url' => route('/')])
View Now
@endcomponent

Thank You,<br>
{{ config('app.name') }}
@endcomponent
