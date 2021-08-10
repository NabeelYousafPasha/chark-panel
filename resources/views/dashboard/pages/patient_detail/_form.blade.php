<div class="form-group @error('profession') has-error @enderror">
    <label class="control-label" for="profession">Profession *</label>
    <input
        type="text"
        id="profession"
        name="profession"
        class="form-control"
        required
    >
    @error('profession')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('personal_id') has-error @enderror">
    <label class="control-label" for="personal_id">Personal ID *</label>
    <input
        type="text"
        id="personal_id"
        name="personal_id"
        class="form-control"
        required
    >
    @error('personal_id')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('contact') has-error @enderror">
    <label class="control-label" for="contact">Telephone Number *</label>
    <input
        type="text"
        id="contact"
        name="contact"
        class="form-control"
        required
    >
    @error('contact')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('address') has-error @enderror">
    <label class="control-label" for="address">Address *</label>
    <textarea 
        name="address" 
        id="address" 
        rows="4"
        class="form-control"
    ></textarea>
    @error('address')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('postal_code') has-error @enderror">
    <label class="control-label" for="postal_code">Post Code *</label>
    <input
        type="text"
        id="postal_code"
        name="postal_code"
        class="form-control"
        required
    >
    @error('postal_code')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group @error('city') has-error @enderror">
    <label class="control-label" for="city">City *</label>
    <input
        type="text"
        id="city"
        name="city"
        class="form-control"
        required
    >
    @error('city')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group @error('province') has-error @enderror">
    <label class="control-label" for="province">Province *</label>
    <input
        type="text"
        id="province"
        name="province"
        class="form-control"
        required
    >
    @error('province')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
