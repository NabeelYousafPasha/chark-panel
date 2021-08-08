<div class="form-group @error('clinic_id') has-error @enderror">
    <label class="control-label" for="clinic_id">Bill to *</label>
    <select
        id="clinic_id"
        name="clinic_id"
        class="form-control select2"
        required
    >
        <option value=""></option>
        @foreach($clinics ?? [] as $clinicId => $clinic)
            <option
                value="{{ $clinicId }}"
                {{ ($module->clinic_id ?? '') == $clinicId ? 'selected' : '' }}
                {{ old('clinic_id') == $clinicId ? 'selected' : '' }}
            >
                {{ $clinic }}
            </option>
        @endforeach
    </select>
    @error('clinic_id')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('email') has-error @enderror">
    <label class="control-label" for="email">Email *</label>
    <input
        type="email"
        class="form-control"
        id="email"
        name="email"
        placeholder="Email Address"
        value="{{ $module->email ?? old('email') }}"
        required
    >
    @error('email')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('alias') has-error @enderror">
    <label class="control-label" for="alias">Patient / ID / Alias *</label>
    <input
        type="text"
        class="form-control"
        id="alias"
        name="alias"
        placeholder="Patient"
        value="{{ $module->alias ?? old('alias') }}"
        required
    >
    @error('alias')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('gender') has-error @enderror">
    <label class="control-label" for="gender">Gender *</label>
    <br>

    <label class="m-r">
        <input
            id="gender_male"
            name="gender"
            type="radio"
            class="@error('gender') has-error @enderror"
            value="{{ strtolower(config('constants.gender.male')) ?? old('gender') }}"
            {{ old('gender') == strtolower(config('constants.gender.male')) ? 'checked' : '' }}
            required
        >
        <span>{{ config('constants.gender.male') }}</span>
    </label>

    <label class="m-r">
        <input
            id="gender_female"
            name="gender"
            type="radio"
            class="@error('gender') has-error @enderror"
            value="{{ strtolower(config('constants.gender.female')) ?? old('gender') }}"
            {{ old('gender') == strtolower(config('constants.gender.female')) ? 'checked' : '' }}
            required
        >
        <span>{{ config('constants.gender.female') }}</span>
    </label>

    @error('gender')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('dob') has-error @enderror">
    <label class="control-label" for="dob">Date of Birth *</label>
    <input
        type="date"
        class="form-control"
        id="dob"
        name="dob"
        placeholder=""
        value="{{ $module->dob ?? old('dob') }}"
        required
    >
    @error('dob')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('country_id') has-error @enderror">
    <label class="control-label" for="country_id">Bill to *</label>
    <select
        id="country_id"
        name="country_id"
        class="form-control select2"
        required
    >
        <option value=""></option>
        @foreach($countries ?? [] as $countryId => $country)
            <option
                value="{{ $countryId }}"
                {{ ($module->country_id ?? '') == $countryId ? 'selected' : '' }}
                {{ old('country_id') == $countryId ? 'selected' : '' }}
            >
                {{ $country }}
            </option>
        @endforeach
    </select>
    @error('country_id')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
