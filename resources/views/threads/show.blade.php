@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <div class="card  mb-3">
                    <div class="card-header">
                        <div class="level">
                            <span class="flex">
                                <a href="{{ route('profile', $thread->creator) }}">{{ $thread->creator->name }}</a> posted:
                                <h4>{{ $thread->title }}</h4>
                            </span>
{{--                            @can($thread->user_id == auth()->id())--}}
                            <div>
                                <form action="{{ $thread->path() }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete Thread</button>
                                </form>
                            </div>
{{--                            @endcan--}}
                        </div>

                    </div>

                    <div class="card-body">
                        <article>
                            <div class="body">{{ $thread->body }}</div>
                        </article>
                    </div>
                </div>

                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach

                {{ $replies->links() }}

                @if(auth()->check())

                    <hr>
                    <form method="POST" action="{{ $thread->path() . '/replies' }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="" cols="30" rows="10" placeholder="Have something to say?"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                @else
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion</p>
                @endif
            </div>

            <div class="col-md-4">
                <div class="card  mb-3">
                    <div class="card-body">
                        <p>
                            This thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="#">{{ $thread->creator->name }}</a> and currently have {{ $thread->replies_count }} {{ Str::plural('comment', $thread->replies_count) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
