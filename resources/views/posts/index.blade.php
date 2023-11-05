@extends('layouts.app')
@section('content')

<div class="container" style="padding-top: 10px; padding-bottom: 150px;">
    <div class="row">
        @foreach($posts as $post)
            @include('posts.partials.posts-details')
        @endforeach
    </div>
</div>

@endsection
