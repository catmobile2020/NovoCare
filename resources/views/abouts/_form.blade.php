<div class="form-group">
    <p>
        <label for="en_title">{{ __('Title') }} (EN)</label>
        <input class="form-control" type="text" id="en_title" name="en_title" value="{{ old('en_title', $about->en_title ?? null) }}"/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="en_caption">{{ __('Caption') }} (EN)</label>
        <textarea rows="3" class="form-control fn_post_editor" type="text" id="en_caption" name="en_caption">{{ old('en_caption', $about->en_caption ?? null) }}</textarea>
    </p>
</div>
<div class="form-group">
    <p>
        <label for="ar_title">{{ __('Title') }} (AR)</label>
        <input class="form-control" type="text" id="ar_title" name="ar_title" value="{{ old('ar_title', $about->ar_title ?? null) }}"/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="ar_caption">{{ __('Caption') }} (AR)</label>
        <textarea rows="3" class="form-control fn_post_editor" type="text" id="ar_caption" name="ar_caption">{{ old('ar_caption', $about->ar_caption ?? null) }}</textarea>
    </p>
</div>
@component('layouts.components.errors')
@endcomponent
