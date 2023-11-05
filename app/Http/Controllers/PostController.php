<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\DeletePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', ['posts' => Post::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    // Old post method created
    public function store(CreatePostRequest $request)
    {
        $title = ucfirst($request->get('title'));
        $content = ucfirst($request->get('content'));

        $request->user()->posts()->create([
            'title' => $title,
            'content' => $content,
            'created_at' => now()->subYear()
        ]);

        return redirect()->route('home')->with('success', 'Your post has been created successfully!');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Your post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeletePostRequest $request, Post $post)
    {
        // Check if the post has any comments
        if ($post->comments()->count()) {
            return redirect()->back()->with('error', 'Unable to delete the post. It has comments.');
        }

        // If no comments are found, delete the post
        $post->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Your post has been deleted successfully!');
    }

    /**
     * Search the specified content.
     */
    public function search(Request $request)
    {
        $searchQuery = $request->searchQuery;

        $posts = Post::where('title', 'LIKE', "%$searchQuery%")
            ->orWhere('content', 'LIKE', "%$searchQuery%")
            ->orWhereHas('comments', function ($query) use ($searchQuery) {
                $query->where('comment', 'LIKE', "%$searchQuery%");
            })
            ->get();
              
        return view('posts.search_results', ['posts' => $posts]);
    }
}
