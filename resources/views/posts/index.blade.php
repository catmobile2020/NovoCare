@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            @forelse ($posts as $post)
                <div class="card shadow-sm mb-4
            @if($post->trashed())
                    border-danger border-top-0 border-right-0 border-bottom-0
            @elseif(now()->diffInMinutes($post->created_at) < 30)
                                border-success border-top-0 border-right-0 border-bottom-0
            @endif
                    ">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a class="{{ $post->trashed() ? 'text-muted' : 'text-dark'}}"
                               href="{{ route('posts.show', ['post' => $post->id]) }}"
                               style="text-decoration: none"
                            >
                                {{ $post->en_title }}
                            </a>
                        </h4>


                        <p class="card-text">
                            <small class="text-muted">
                                {{ $post->en_caption }}
                            </small>
                        </p>
                    </div>

                    <div class="card-footer d-flex justify-content-around">

                        {{ $post->created_at }}

                        @auth
                            <div class="d-flex align-self-center">
                                <a class="badge badge-light mr-1" href="{{ route('posts.edit', ['post' => $post->id])}}">{{ __('Edit') }}</a>

                                @if (!$post->trashed())
                                    <a class="badge badge-light"
                                       href="{{ route('posts.destroy', ['post' => $post->id])}}"
                                       onclick="event.preventDefault();document.getElementById('fn-delete-form_{{ $post->id }}').submit()">{{ __('Delete') }}</a>
                                    <form style="display:none" id="fn-delete-form_{{ $post->id }}" method="POST"
                                          action="{{ route('posts.destroy', ['post'=>$post->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="delete"/>
                                    </form>
                                @else
                                    <a class="badge badge-light"
                                       href="{{ route('posts.destroy', ['post' => $post->id])}}"
                                       onclick="event.preventDefault();document.getElementById('fn-restore-form_{{ $post->id }}').submit()">{{ __('Restore') }}</a>
                                    <form style="display:none" id="fn-restore-form_{{ $post->id }}"
                                          method="POST"
                                          action="{{ route('posts.restore', ['post' => $post->id])}}">
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
                            {{ __('No blog posts yet!') }}
                        </h5>
                    </div>
                </div>
            @endforelse


            {{ $posts->links() }}

        </div>


    </div>

@endsection
