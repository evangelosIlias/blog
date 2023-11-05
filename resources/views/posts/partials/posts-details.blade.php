<div class="col-md-5 mt-6">
    <div class="card d-flex flex-column" style="min-height: 200px;">
        <div class="card-body">
            <h6 class="card-title" style="font-size: 1.25em; font-weight: bold;">{{ $post->title }}</h6>
            <p class="card-text">{{ substr($post->content, 0, 148) . '...' }}</p>
        </div>
        <div class="card-footer mt-auto" style="display: flex; justify-content: space-between; align-items: center;">
            <small class="text-muted">Created {{ $post->created_at->format('d M Y') }}</small>
            <div>
                <a href="{{ route('posts.show', $post) }}" > 
                    <i class="fa-solid fa-eye" style="font-size: 24px; color: #7e99c9;" title="Go to Post"></i>
                </a>
            </div>
        </div>
    </div>
</div>


