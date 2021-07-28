<div class="form-group @error('organization_id') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'organization_id') }} *</label>
    <select
        id="organization_id"
        name="organization_id"
        class="form-control select2"
    >
        <option value=""></option>
        @foreach($organizations ?? [] as $key => $organization)
            <option value="{{ $organization->id }}"
                {{ (auth()->user()->organization_id ?? '') == $organization->id ? 'selected' : '' }}
                {{ ($user->organization_id ?? '') == $organization->id ? 'selected' : '' }}
            >
                {{ $organization->name }}
            </option>
        @endforeach
    </select>
    @error('organization_id')
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
        value="{{ $user->name ?? old('name') }}"
        required
    >
    @error('name')
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
        value="{{ $user->email ?? old('email') }}"
        required
    >
    @error('email')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


@empty($user)
<div class="form-group @error('password') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'password') }} *</label>
    <input
        type="password"
        class="form-control"
        name="password"
        placeholder="{{ trans($translationFromKey.'.'.'password') }}"
        value="{{ $user->password ?? '' }}"
        required
    >
    @error('password')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@endempty
