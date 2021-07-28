<div class="form-group @error('gender') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'gender') }}</label>
    <div class="i-checks">
        <label>
            <input
                type="radio"
                name="gender"
                id="male"
                value="male"
                {{ (($userDetail->gender ?? false) == 'male') ? 'checked' : '' }}
                required
            >
            <i class="fa fa-male fa-fw"></i> Male
        </label>
        &emsp;
        <label>
            <input
                type="radio"
                name="gender"
                id="female"
                value="female"
                {{ (($userDetail->gender ?? false) == 'female') ? 'checked' : '' }}
                required
            >
            <i class="fa fa-female fa-fw"></i> Female
        </label>
    </div>
    @error('gender')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('contact_email') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'contact_email') }} {{ trans('lang.forms.optional_field') }}</label>
    <input
        type="email"
        class="form-control"
        name="contact_email"
        placeholder="{{ trans($translationFromKey.'.'.'contact_email') }}"
        value="{{ $userDetail->contact_email ?? old('contact_email') }}"
    >
    @error('contact_email')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('cellular_number') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'cellular_number') }} *</label>
    <input
        type="text"
        class="form-control"
        name="cellular_number"
        placeholder="{{ trans($translationFromKey.'.'.'cellular_number') }}"
        value="{{ $userDetail->cellular_number ?? old('cellular_number') }}"
        required
    >
    @error('cellular_number')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('country_id') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'country_id') }} *</label>
    <select
        id="country_id"
        name="country_id"
        class="form-control select2"
        required
    >
        <option value=""></option>
        @foreach($countries ?? [] as $key => $country)
            <option value="{{ $country->id }}"
                {{ ($userDetail->country_id ?? '') == $country->id ? 'selected' : '' }}
                {{ old('country_id') == $country->id ? 'selected' : '' }}
            >
                {{ $country->name }}
            </option>
        @endforeach
    </select>
    @error('country_id')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('address') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'address') }} *</label>
    <input
        type="text"
        class="form-control"
        name="address"
        placeholder="{{ trans($translationFromKey.'.'.'address') }}"
        value="{{ $userDetail->address ?? old('address') }}"
        required
    >
    @error('address')
    <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('department') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'department') }} *</label>
    <input
        type="text"
        class="form-control"
        name="department"
        placeholder="{{ trans($translationFromKey.'.'.'department') }}"
        value="{{ $userDetail->department ?? old('department') }}"
        required
    >
    @error('department')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('designation') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'designation') }} *</label>
    <input
        type="text"
        class="form-control"
        name="designation"
        placeholder="{{ trans($translationFromKey.'.'.'designation') }}"
        value="{{ $userDetail->designation ?? old('designation') }}"
        required
    >
    @error('designation')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
