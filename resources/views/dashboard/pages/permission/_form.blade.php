<div class="form-group @error('name') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'name') }} *</label>
    <input
        type="text"
        class="form-control"
        name="name"
        placeholder="{{ trans($translationFromKey.'.'.'name') }}"
        value="{{ $task->name ?? old('name') }}"
        required
    >
    @error('name')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group @error('reference') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'reference') }} *</label>
    <input
        type="text"
        class="form-control"
        name="reference"
        placeholder="{{ trans($translationFromKey.'.'.'reference') }}"
        value="{{ $task->reference ?? old('reference') }}"
        required
    >
    @error('reference')
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
    >{{ $task->description ?? old('description') }}</textarea>
    @error('description')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group @error('module_id') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'module_id') }} *</label>
    <select name="module_id">
        <option value="">--Select--</option>
        @forelse ($modules as $key => $module)
        <option value="{{ $module->id }}" {{ ($task->module_id ?? '') == $module->id ? 'selected' : '' }} >{{ $module->name }}</option>
        @empty
        No modules found.
        @endforelse
      </select>
    @error('name')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>


