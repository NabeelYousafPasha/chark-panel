<div class="form-group @error('industry_id') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'industry_id') }} *</label>
    <select
        id="industry_id"
        name="industry_id"
        class="form-control select2"
        required
    >
        <option value=""></option>
        @foreach($industries ?? [] as $industryId => $industry)
            <option
                value="{{ $industryId }}"
                {{ ($module->industry_id ?? '') == $industryId ? 'selected' : '' }}
                {{ old('industry_id') == $industryId ? 'selected' : '' }}
            >
                {{ $industry }}
            </option>
        @endforeach
    </select>
    @error('industry_id')
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
        value="{{ $module->name ?? old('name') }}"
        required
    >
    @error('name')
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
    >{{ $module->description ?? old('description') }}</textarea>
    @error('description')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
