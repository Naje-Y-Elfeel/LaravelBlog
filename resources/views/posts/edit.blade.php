@extends('layouts.app')

@section('content')
<h1>Edit {{ $post->title}}</h1>
<hr/>

{!! Form::open(['action'=>['postController@update', $post->id], 'method'=>'POST']) !!}

  {{ Form::hidden('_method', 'PUT') }}

  <div class="form-group">
    {{ Form::label('Title') }}
    {{ Form::text('title', $post->title, [ 'placeholder'=>'Enter Post Title', 'class'=>'form-control' ]) }}
  </div>

  <div class="form-group">
    {{ Form::label('Body') }}
    {{ Form::textarea('body', $post->body, [ 'placeholder'=>'Enter Post body', 'class'=>'form-control ckeditor' ]) }}
  </div>

  <div class="form-group">
    {{ Form::label('Tag') }}
    <select class="form-control tags" name="tags[]" multiple>
      @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
      @endforeach
    </select>
  </div>


  <div class="form-group">
    {{ Form::submit('Update', ['class'=>'btn btn-primary'])}}
  </div>
{!! Form::close() !!}
@endsection
