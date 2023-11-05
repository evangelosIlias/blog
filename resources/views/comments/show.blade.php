<div id="comment-{{ $comment->id }}" class="card" style="margin-top: 10px;">
    <div class="card-body" style="display: flex; justify-content: space-between;">
        <div style="width: 70%;">
            <p>{{ $comment->comment }}</p>
            <div style="font-size: 12px; margin-top: 20px;">
                <small class="date" >Created {{ $comment->created_at->format('d M Y') }}</small> - 
                <small class="date">Edited {{ $comment->updated_at->format('d M Y') }}</small>
            </div>
        </div>
        <div style="display: flex; align-items: center; margin-top: 30px; font-size: 20px; justify-content: space-between;">
            
            @if (Auth::check() && Auth::id() == $comment->user_id)
                <a href="{{ route('comments.edit', $comment) }}">
                    <i class="fa-solid fa-pen-to-square" style="margin-right: 5px; color: #7149ab;" title="Edit Post"></i>
                </a>
                <form method="post" action="{{ route('comments.delete', $comment) }}">
                    @method('delete')
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-trash" style="color: #c56385;" title="Delete Post"></i>
                    </button>
                @endif
            </form>
        </div>
    </div>
</div>