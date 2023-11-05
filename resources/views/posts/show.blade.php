@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        @include('posts.partials.show-posts-details', ['post' => $post])
    </div>
</div>
@endsection