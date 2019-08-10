@extends('layouts.app')

@section('content')
<div class="row">

  <div class="col-9">
    <h1 class="mb-3"> {{ $post->title}} </h1>

    <div>
      <img src="{{ asset('images/posts/'.$post->photo) }}" class="img-responsive">
      {!! $post->body !!}

      @foreach($post->tags as $tag)
        <a href="{{ route('tags.show', $tag->id) }}">          
          <p class="badge badge-info">
            {{ $tag->tag }}
          </p>
        </a>
      @endforeach
    </div>

    <hr>

    <h4>Comments: {{ $post->comments->count() }}</h4>

    <br>

    <ul class="comments">
      @foreach($post->comments as $comment)
      <li class="comment">
        <div>
          <h4>{{ $comment->user->name}}</h4>
          <p class="float-right">{{ $comment->created_at->format('d M Y') }}</p>
        </div>

        <p>{{ $comment->body }}</p>
      </li>
      @endforeach

    </ul>

      <div class="card">
        <div class="card-body">
          <div class="card-text">
            @guest
             <div class="alert alert-info">Please Log in to Comment</div>
            @else
            <form  action="{{ route('comments.store', [$post->slug]) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="comment">Add Your Comment</label>
                  <textarea name="body" class="form-control" rows="10" cols="30" placeholder="Enter your comment here"></textarea>
                </div>

                <div class="form-group float-right">
                  <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
            @endguest
          </div>
        </div>
      </div>
  </div>

  <div class="col-3">
    @if( !Auth::guest() && ( Auth::user()->id == $post->user_id ))
    <div class="card">
      <h2 class="card-header">Manage Post</h2>
      <div class="card-body">
        <a href="/blog/public/posts/{{ $post->id }}/edit" class="btn btn-info mb-3">EDIT</a>
        {!! Form::open(['action'=>['postController@destroy', $post->id ] , 'method'=>'POST']) !!}

            {{ Form::hidden('_method', 'DELETE') }}
            <button type="submit" class="btn btn-danger">DELETE</button>

        {!! Form::close() !!}
      </div>
    </div>
    @endif
  </div>
</div>

@endsection
