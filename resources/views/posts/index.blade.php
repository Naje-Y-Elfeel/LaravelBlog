@extends('layouts.app')

@section('content')

  <h2>Blog Posts</h2>

  @if($posts->count() > 0)
  <div class="row">

    <div class="col-md-8">
      @foreach($posts as $post)
        <div class="card mb-5">
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

    </div>
    <div class="col-md-4">
      <div class="card">
        <h4 class="card-header">Tags</h4>
        <div class="card-body">
          @foreach($tags as $tag)
            <a href="{{ route('tags.show', $tag->id) }}">
              <p class="badge badge-info">
                {{ $tag->tag }}
              </p>
            </a>
          @endforeach
        </div>
      </div>
    </div>

    {{ $posts->links() }}

  </div>

  @else
    <div class="alert alert-info">
      <strong>Oops</strong> No posts found
    </div>
  @endif
@endsection
