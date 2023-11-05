<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Notifications\NewCommentNotification;
use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Requests\Comment\DeleteCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCommentRequest $request)
    {
        $post = Post::findOrFail($request->post_id);

        // Create a new comment
        $comment = $request->user()
            ->comments()
            ->create([
                'post_id' => $request->post_id,
                'comment' => ucfirst($request->comment),
        ]);

        if ($post->user_id !== $comment->user_id) {
            $post->user->notify(new NewCommentNotification($comment, $post));
        }

        return redirect()
            ->back()
            ->with('success', 'Your comment has been added successfully!'); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {   
        $comment->update([
            'comment' => ucfirst($request->commentUpdate),
        ]);
    
        return redirect()
            ->route('posts.show', $comment->post)
            ->with('success', 'Your comment has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCommentRequest $request, Comment $comment)
    {
        $comment->delete();

        return redirect()
            ->route('posts.show', $comment->post)
            ->with('success', 'Your comment has been deleted successfully!');
    }

}
