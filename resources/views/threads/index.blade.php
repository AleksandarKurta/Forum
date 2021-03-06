@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($threads as $thread)
                <div class="card mb-3">
                    <div class="card-header">
                        <article>
                            <div class="level">
                                <h4 class="flex">
                                    <a href="{{ $thread->path() }}">
                                        {{ $thread->title }}
                                    </a>
                                </h4>

                                <a href="{{ $thread->path() }}">
                                    {{ $thread->replies_count }} {{ Str::plural('comment', $thread->replies_count) }}
                                </a>
                            </div>
                        </article>
                    </div>

                    <div class="card-body">
                        <div class="body">
                            {{ $thread->body }}
                        </div>
                    </div>
                </div>
                @empty
                    <p class="text-center">There are no records at this time!</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
