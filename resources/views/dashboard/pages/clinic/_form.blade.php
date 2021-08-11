<div class="form-group @error('name') has-error @enderror">
    <label for="name" class="control-label">Name *</label>
    <input
        type="text"
        id="name"
        name="name"
        class="form-control"
        placeholder="Name of Clinic"
        value="{{ $clinic->name ?? old('name') }}"
        required
    >

    @error('name')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('details') has-error @enderror">
    <label for="details" class="control-label">Details</label>
    <textarea
        id="details"
        name="details"
        class="form-control"
        placeholder="Details"
        rows="5"
        required
    >{{ $clinic->details ?? old('details') }}</textarea>

    @error('details')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
