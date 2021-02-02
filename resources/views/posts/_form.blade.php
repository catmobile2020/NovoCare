<div class="form-group">
    <p>
        <label for="title">{{ __('Title') }}</label>
        <input class="form-control" type="text" id="title" name="title" value="{{ old('title', $post->title ?? null) }}"/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="caption">{{ __('Caption') }}</label>
        <textarea rows="3" class="form-control" type="text" id="caption" name="caption">{{ old('caption', $post->caption ?? null) }}</textarea>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="text">{{ __('Text') }}</label>
        <textarea rows="10" class="form-control fn_post_editor" type="text" id="text" name="text">{{ old('text', $post->text ?? null) }}</textarea>
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
        <label for="is_active">{{ __('Status') }}</label>
        <select class="form-control" id="is_active" name="is_active">
            <option {{ old('is_active', $post->isActive ?? 'selected') }} value="{{ true }}">Active</option>
            <option {{ old('is_active', $post->isActive ?? 'selected') }} value="{{ false }}">Nonactive</option>
        </select>
    </p>
</div>


@component('layouts.components.errors')
@endcomponent
