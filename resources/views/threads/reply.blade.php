<div class="card mb-2">
    <div class="card-header">
        <div class="level">
            <h5 class="flex">
                <a href="{{ route('profile', $reply->owner) }}">
                    {{ $reply->owner->name }}
                </a>
                said {{ $reply->created_at->diffForHumans() }}...
            </h5>

            <div>
                <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                    @csrf
                    <button class="btn btn-sm btn-primary" type="submit" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        {{ $reply->favorite_count }} {{ Str::plural('Favorite', $reply->favorite_count) }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">
        <article>
            <div class="body">{{ $reply->body }}</div>
        </article>
    </div>
</div>
