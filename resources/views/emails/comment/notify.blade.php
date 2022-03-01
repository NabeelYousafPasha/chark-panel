@component('mail::message')
# New Comment on Treatment Plan

Dear {{ $user->name ?? '' }},

You have received a new comment on your patient <b>{{ $patient->alias }}</b>'s assessment held at {{ $assessment->created_at }}.

```
{{ $comment->comment }}
```

You can read more in detail by visitng our dashboard:

@component('mail::button', ['url' => route('/')])
Preview Comment
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
