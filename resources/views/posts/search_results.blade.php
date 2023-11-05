@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 10px; padding-bottom: 150px;">
    <div class="row">
        @if($posts->isEmpty())
            <p>Oops, seems the post, title or comment you looking for not Found</p>
        @else
            @foreach($posts as $post)
                @include('posts.partials.posts-details')
            @endforeach
        @endif
    </div>
</div>
@endsection
