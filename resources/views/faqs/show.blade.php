@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">

                    <h1 class="card-title">
                        {{ $faq->question }}
                        @component('layouts.components.badge', ['show' => now()->diffInMinutes($faq->created_at) < 30])
                            New!
                        @endcomponent
                    </h1>

                    <p class="card-text">{!! $faq->answer !!}</p>

                    <div class="d-flex justify-content-around">
                        <p class="card-text">
                            @component('layouts.components.updated', ['date' => $faq->created_at])
                            @endcomponent
                        </p>

                        <p class="card-text">
                            @component('layouts.components.updated', ['date' => $faq->updated_at])
                                updated
                            @endcomponent
                        </p>

                    </div>


                </div>

                @auth
                    <div class="card-footer d-flex justify-content-around">
                        <div class="d-flex align-self-center">
                            <a class="badge badge-light mr-1"
                               href="{{ route('faqs.edit', ['faq'=>$faq->id])}}">{{ __('Edit') }}</a>

                            @if (!$faq->trashed())
                                <a class="badge badge-light" href="{{ route('faqs.destroy', ['faq'=>$faq->id])}}"
                                   onclick="event.preventDefault();document.getElementById('fn-delete-form_{{ $faq->id }}').submit()">{{ __('Delete') }}</a>
                                <form style="display:none" id="fn-delete-form_{{ $faq->id }}" method="POST"
                                      action="{{ route('faqs.destroy', ['faq'=>$faq->id])}}">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="delete"/>
                                </form>
                            @else
                                <a class="badge badge-light" href="{{ route('faqs.destroy', ['faq'=>$faq->id])}}"
                                   onclick="event.preventDefault();document.getElementById('fn-restore-form_{{ $faq->id }}').submit()">{{ __('Restore') }}</a>
                                <form style="display:none" id="fn-restore-form_{{ $faq->id }}" method="POST"
                                      action="{{ route('faqs.restore', ['faq'=>$faq->id])}}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="submit" value="delete"/>
                                </form>
                            @endif
                        </div>
                    </div>
                @endauth
            </div>

        </div>

    </div>
@endsection
