<div class="form-group">
    <p>
        <label for="en_title">{{ __('Title') }} (EN)</label>
        <input class="form-control" type="text" id="en_title" name="en_title" value="{{ old('en_title', $post->en_title ?? null) }}"/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="en_caption">{{ __('Caption') }} (EN)</label>
        <textarea rows="3" class="form-control" type="text" id="en_caption" name="en_caption">{{ old('en_caption', $post->en_caption ?? null) }}</textarea>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="en_text">{{ __('Text') }} (EN)</label>
        <textarea rows="10" class="form-control fn_post_editor" type="text" id="en_text" name="en_text">{{ old('en_text', $post->en_text ?? null) }}</textarea>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="ar_title">{{ __('Title') }} (AR)</label>
        <input class="form-control" type="text" id="ar_title" name="ar_title" value="{{ old('ar_title', $post->ar_title ?? null) }}"/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="ar_caption">{{ __('Caption') }} (AR)</label>
        <textarea rows="3" class="form-control" type="text" id="ar_caption" name="ar_caption">{{ old('ar_caption', $post->ar_caption ?? null) }}</textarea>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="ar_text">{{ __('Text') }} (AR)</label>
        <textarea rows="10" class="form-control fn_post_editor" type="text" id="ar_text" name="ar_text">{{ old('ar_text', $post->ar_text ?? null) }}</textarea>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="image">{{ __('Image') }}</label>
        <input class="form-control-file" type="file" id="image" name="image" value=""/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="image">{{ __('Video') }}</label>
        <input class="form-control-file" type="file" id="video" name="video" value=""/>
    </p>
</div>


<div class="form-group">
    <p>
        <label for="is_active">{{ __('Status') }}</label>
        <select class="form-control" id="is_active" name="is_active">
            <option {{ old('is_active', $post->isActive ?? 'selected') }} value="{{ true }}">Active</option>
            <option {{ old('is_active', $post->isActive ?? 'selected') }} value="{{ false }}">Nonactive</option>
        </select>
    </p>
</div>


@component('layouts.components.errors')
@endcomponent
