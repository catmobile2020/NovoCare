<div class="form-group">
    <p>
        <label for="question">{{ __('Question') }}</label>
        <input class="form-control" type="text" id="question" name="question" value="{{ old('question', $faq->question ?? null) }}"/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="answer">{{ __('Answer') }}</label>
        <textarea rows="3" class="form-control" type="text" id="answer" name="answer">{{ old('answer', $faq->answer ?? null) }}</textarea>
    </p>
</div>

@component('layouts.components.errors')
@endcomponent
