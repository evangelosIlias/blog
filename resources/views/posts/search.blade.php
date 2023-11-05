@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        @if ($posts->isEmpty())

        @endif
    Found {{ $posts->count() }} posts
            @foreach($posts as $post)
        @include()
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ substr($post->content, 0, 30)}}</p>
                    <p class="card-text">Created on: {{ $post->created_at }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Go to Post</a>
                    @if (Auth::id() == $post->user_id)
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary">Edit Post</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection