<div class="form-group @error('user') has-error @enderror">
    <label class="control-label">User *</label>
    <select
        id="user"
        name="user"
        class="form-control select2"
        required
    >
        <option value=""></option>
        @foreach($users ?? [] as $key => $user)
            <option
                value="{{ $user->id }}"
                {{ ($userFiltered ?? null) == $user->id ? 'selected' : '' }}
            >
                {{ $user->name }}
            </option>
        @endforeach
    </select>
    @error('user')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('from_date') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'from_date') }} </label>
    <input
        type="text"
        class="form-control eosd__datepicker"
        name="from_date"
        placeholder="{{ trans($translationFromKey.'.'.'from_date') }}"
        value="{{ $from_date ?? old('from_date') }}"
    >
    @error('from_date')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('to_date') has-error @enderror">
    <label class="control-label">{{ trans($translationFromKey.'.'.'to_date') }} </label>
    <input
        type="text"
        class="form-control eosd__datepicker"
        name="to_date"
        placeholder="{{ trans($translationFromKey.'.'.'to_date') }}"
        value="{{ $to_date ?? old('to_date') }}"
    >
    @error('to_date')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>



