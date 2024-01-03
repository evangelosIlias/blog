<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="mb-3">
        <label for="comment" class="form-label">Add Comment</label>
        <textarea class="form-control" id="comment" name="comment" rows="2"></textarea>
    </div>
    <button type="submit" id="submit-button" class="btn btn" style="background-color: rgb(202, 18, 177); color: white;">Add Comment</button>
</form>