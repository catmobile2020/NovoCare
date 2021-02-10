<div class="form-group">
    <p>
        <label for="en_question">{{ __('Question') }} (EN)</label>
        <input class="form-control" type="text" id="en_question" name="en_question" value="{{ old('en_question', $faq->en_question ?? null) }}"/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="en_answer">{{ __('Answer') }} (EN)</label>
        <textarea rows="3" class="form-control" type="text" id="en_answer" name="en_answer">{{ old('en_answer', $faq->en_answer ?? null) }}</textarea>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="ar_question">{{ __('Question') }} (AR)</label>
        <input class="form-control" type="text" id="ar_question" name="ar_question" value="{{ old('ar_question', $faq->ar_question ?? null) }}"/>
    </p>
</div>

<div class="form-group">
    <p>
        <label for="ar_answer">{{ __('Answer') }} (AR)</label>
        <textarea rows="3" class="form-control" type="text" id="ar_answer" name="ar_answer">{{ old('ar_answer', $faq->ar_answer ?? null) }}</textarea>
    </p>
</div>
@component('layouts.components.errors')
@endcomponent
