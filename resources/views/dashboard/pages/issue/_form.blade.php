<div class="form-group @error('subject') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'subject') }} *</label>
    <input
        type="text"
        class="form-control"
        name="subject"
        placeholder="{{ trans($translationFromKey.'.'.'subject') }}"
        value="{{ $module->subject ?? old('subject') }}"
        required
    >
    @error('subject')
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

<div class="form-group @error("$inputFile") has-error @enderror">
    <label class="control-label">{{ trans('lang.file.attach') }} </label>
    <input
        class="form-control"
        type="file"
        id="{{ $inputFile }}"
        name="{{ $inputFile }}"
        accept="image/*"
    >

    <span class="help-block">
        File must be only: JPG, JPEG, PNG, DOCX, XLSX, PDF
    </span>
    @error("$inputFile")
    <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
