@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            @forelse ($faqs as $faq)
                <div class="card shadow-sm mb-4
            @if($faq->trashed())
                    border-danger border-top-0 border-right-0 border-bottom-0
            @elseif(now()->diffInMinutes($faq->created_at) < 30)
                                border-success border-top-0 border-right-0 border-bottom-0
            @endif
                    ">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="{{ $faq->trashed() ? 'text-muted' : 'text-dark'}}"
                               href="{{ route('faqs.show', ['faq' => $faq->id]) }}"
                               style="text-decoration: none"
                            >
                                {{ $faq->question }}
                            </a>
                        </h4>


                        <p class="card-text">
                            <small class="text-muted">
                                {{ $faq->answer }}
                            </small>
                        </p>
                    </div>

                    <div class="card-footer d-flex justify-content-around">

                        {{ $faq->created_at }}

                        @auth
                            <div class="d-flex align-self-center">
                                <a class="badge badge-light mr-1" href="{{ route('faqs.edit', ['faq' => $faq->id])}}">{{ __('Edit') }}</a>

                                @if (!$faq->trashed())
                                    <a class="badge badge-light"
                                       href="{{ route('faqs.destroy', ['faq' => $faq->id])}}"
                                       onclick="event.preventDefault();document.getElementById('fn-delete-form_{{ $faq->id }}').submit()">{{ __('Delete') }}</a>
                                    <form style="display:none" id="fn-delete-form_{{ $faq->id }}" method="POST"
                                          action="{{ route('faqs.destroy', ['faq'=>$faq->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete"/>
                                    </form>
                                @else
                                    <a class="badge badge-light"
                                       href="{{ route('faqs.destroy', ['faq' => $faq->id])}}"
                                       onclick="event.preventDefault();document.getElementById('fn-restore-form_{{ $faq->id }}').submit()">{{ __('Restore') }}</a>
                                    <form style="display:none" id="fn-restore-form_{{ $faq->id }}"
                                          method="POST"
                                          action="{{ route('faqs.restore', ['faq' => $faq->id])}}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="submit" value="delete"/>
                                    </form>
                                @endif
                            </div>
                        @endauth
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ __('No blog faqs yet!') }}
                        </h5>
                    </div>
                </div>
            @endforelse


            {{ $faqs->links() }}

        </div>


    </div>

@endsection
