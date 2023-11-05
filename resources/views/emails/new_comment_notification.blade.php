@component('mail::message')
# New Comment on Your Post

Hi {{ $notifiable->name }},

A user has commented on your post: "{{ $post->title }}".

Comment: {{ $comment->content }}

@component('mail::button', ['url' => url('/posts/' . $post->id)])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
