<div class="form-group @error('comment') has-error @enderror">
    <label class="control-label" for="comment">comment *</label>
    <textarea
        class="form-control"
        id="comment"
        name="comment"
        placeholder="Comments"
        required
        rows="10"
    >{{ $comment->comment ?? old('comment') }}</textarea>
    @error('comment')
        <span class="help-block has-error">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
