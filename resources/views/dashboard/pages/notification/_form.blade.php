<div class="form-group @error('notification_type_id') has-error @enderror">
    <label class="control-label">Notification Type *</label>
    <select
        class="form-control select2 required"
        id="notification_type_id"
        name="notification_type_id"
        required
    >
        <option value=""></option>
        @foreach($notificationTypes ?? [] as $notificationType)
            <option
                value="{{ $notificationType->id }}"
                {{  ($notification->notification_type_id ?? '') == $notificationType->id ? 'selected' : '' }}
                {{  old('notification_type_id') == $notificationType->id ? 'selected' : '' }}
            >
                {{ $notificationType->name }}
            </option>
        @endforeach
    </select>

    @error('notification_type_id')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('title') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'title') }} *</label>
    <input
        type="text"
        class="form-control"
        name="title"
        placeholder="{{ trans($translationFromKey.'.'.'title') }}"
        value="{{ $notification->title ?? old('title') }}"
        required
    >

    @error('title')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('description') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'description') }} *</label>
    <textarea
        class="form-control"
        name="description"
        placeholder="{{ trans($translationFromKey.'.'.'description') }}"
        rows="5"
        required
    >{{ $notification->description ?? old('description') }}</textarea>

    @error('description')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


@empty($notification)
<div class="form-group @error('upto_date') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'upto_date') }} *</label>
    <input
        type="text"
        class="form-control eosd__datepicker"
        name="upto_date"
        placeholder="{{ trans($translationFromKey.'.'.'upto_date') }}"
        value="{{ $notification->upto_date ?? old('upto_date') }}"
    >

    @error('upto_date')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('is_enabled') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'is_enabled') }}
    <input
        type="checkbox"
        class="i-checks checkbox"
        name="is_enabled"
        value="1"
        {{ ( $notification->is_enabled ?? '') == '1' ? 'checked': 'unchecked' }}
    >
    </label>
    @error('is_enabled')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@endempty

