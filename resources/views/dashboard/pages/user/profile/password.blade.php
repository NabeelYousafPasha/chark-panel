<div class="form-group @error('email') has-error @enderror">
    <label for="email" class="control-label">Email</label>
    <div class="input-group m-b">
        <input
            type="text"
            id="email"
            name="email"
            class="form-control"
            value="{{ $user->email ?? 'Oops! You are going to change your password' }}"
            disabled
        />
        <span class="input-group-addon" title="Preview / Hide">
            <i class="fa fa-at fa-fw"></i>
        </span>
    </div>
    @error('email')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

@empty($forcedChange)
<div class="form-group @error('old_password') has-error @enderror">
    <label class="control-label">Old Password *</label>
    <div class="input-group m-b">
        <input
            type="password"
            id="old_password"
            name="old_password"
            class="form-control"
            required
        />
        <span class="input-group-addon show_hide__password" title="Preview / Hide">
            <i class="fa fa-eye-slash fa-fw"></i>
        </span>
    </div>
    @error('old_password')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@endempty

<div class="form-group @error('password') has-error @enderror">
    <label class="control-label">New Password *</label>
    <div class="input-group m-b">
        <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            required
        >
        <span class="input-group-addon show_hide__password" title="Preview / Hide">
            <i class="fa fa-eye-slash fa-fw"></i>
        </span>
    </div>
    @error('password')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group @error('password_confirmation') has-error @enderror">
    <label class="control-label">Confirm New Password *</label>
    <input
        type="password"
        class="form-control"
        id="password_confirmation"
        name="password_confirmation"
        required
    >
    @error('password_confirmation')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
