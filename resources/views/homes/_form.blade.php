<div class="form-group">
    <p>
        <label>{{ __('Image') }} <input type="file" name="image" value="{{ $homes->image }}"/></label>
        <small>The dimensioned must be 375*302</small>
        <img src="{{ $homes->image }}" width="300">
    </p>
</div>

<div class="form-group">
    <p>
        <label for="en_caption">{{ __('Caption') }} (EN)</label>
        <textarea rows="3" class="form-control fn_post_editor" type="text" id="en_caption" name="en_caption">{{ old('en_caption', $homes->en_caption ?? null) }}</textarea>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="ar_caption">{{ __('Caption') }} (AR)</label>
        <textarea rows="3" class="form-control fn_post_editor" type="text" id="ar_caption" name="ar_caption">{{ old('ar_caption', $homes->ar_caption ?? null) }}</textarea>
    </p>
</div>
@component('layouts.components.errors')
@endcomponent
