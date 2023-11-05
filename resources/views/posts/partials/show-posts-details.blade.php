<div class="col-md-8 mt-4">
    <div class="card">
        <div class="card-body" style="padding-top: 15px;">
            <h6 class="card-title" style="font-size: 1.25em; font-weight: bold;">{{ $post->title }}</h6>
            <p class="card-text">{{ $post->content }}</p><br>
            <i class="fa-solid fa-calendar-days"></i><small class="date" style="margin-left: 5px;">{{ $post->created_at->format('d M Y') }}</small>
            <br>
            <small class="date"> Created by <span style="font-weight: bold;">{{ $post->user->name }}</span> {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
            <div style="display: flex; align-items: left; margin-top: 10px; font-size: 20px;">
                @if (Auth::id() == $post->user_id)
                    <a href="{{ route('posts.edit', $post) }}">
                        <i class="fa-solid fa-pen-to-square" style="font-size: 24px; margin-right: 5px; color: #7149ab;" title="Edit Post"></i>
                    </a>
                    <a href="{{ route('posts.delete', $post) }}">
                        <i class="fa-solid fa-trash" style="font-size: 24px; color: #c56385;" title="Delete Post"></i>
                    </a>
                @endif
            </div>
        </div>  
    </div>
<div class="mt-4">
    <h4 class="title" style="font-size: 1em; font-weight: bold;">({{ $post->comments->count() }}) Comment</h4>
    <div class="card" style="margin-top: 5px; margin-bottom: 150px;">
        <div class="card-body">
            @foreach ($post->comments as $comment)
                @include('comments.show', ['comment' => $comment])
            @endforeach
                @include('comments.new', ['post' => $post])
            </div>
        </div>
    </div>
</div>



