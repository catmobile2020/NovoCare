<div class="form-group">
    <p>
        <label for="title">{{ __('Title') }}</label>
        <input class="form-control" type="text" id="title" name="title" value="{{ old('title', $terms->title ?? null) }}"/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="caption">{{ __('Caption') }}</label>
        <textarea rows="3" class="form-control fn_post_editor" type="text" id="caption" name="caption">{{ old('caption', $terms->caption ?? null) }}</textarea>
    </p>
</div>

@component('layouts.components.errors')
@endcomponent
