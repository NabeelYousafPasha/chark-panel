<div class="form-group @error('invited_as') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'invited_as') }} *</label>
    <select
        class="form-control select2 required"
        name="invited_as"
        id="invited_as"
        required
        class="form-control select2 required"
    >
        @foreach($invitationAs ?? [] as $invitationKey => $invitation)
            <option value="{{ $invitation }}">
                {{ config("constants.roles.$invitation.name") ?? '--ERROR--' }}
            </option>
        @endforeach
    </select>
    @error('invited_as')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('name') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'name') }} *</label>
    <input
        type="text"
        class="form-control"
        name="name"
        placeholder="{{ trans($translationFromKey.'.'.'name') }}"
        value="{{ $invitation->name ?? old('name') }}"
        required
    >
    @error('email')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('email') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'email') }} *</label>
    <input
        type="email"
        class="form-control"
        name="email"
        placeholder="{{ trans($translationFromKey.'.'.'email') }}"
        value="{{ $invitation->email ?? old('email') }}"
        required
    >
    @error('email')
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
    >{{ $invitation->description ?? old('description') }}</textarea>
    @error('description')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
