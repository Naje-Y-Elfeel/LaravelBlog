@extends('layouts.app')

@section('content')

  <h2>Posts Tagged {{ $tag->tag }}</h2>

  @if($tag->posts->count() > 0)

    @foreach($tag->posts as $post)
      <br>

      <div class="card col-md-8">
        <img class="card-img-top" src="{{ asset('images/posts/'.$post->photo ) }}" height="300px">
        <div class="card-body">

          <h3 class="card-title">
            <a href="/blog/public/posts/{{$post->slug}}">
              {{ $post->title}}
            </a>
          </h3>
          <div class="mb-4">
            <span class="badge badge-info">
              {{ $post->created_at}}
            </span>
            &nbsp
            <span class="badge badge-secondary">
              {{ $post->user->name}}
            </span>
          </div>

          <p class="card-text">{{ str_limit( strip_tags($post->body), 30 ) }}</p>
        </div>
      </div>

    @endforeach

  @else
    <div class="alert alert-info">
      <strong>Oops</strong> No posts found
    </div>
  @endif
@endsection
