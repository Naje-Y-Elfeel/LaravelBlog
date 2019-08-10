@extends('layouts.app')

@section('content')
<h1>Add New Post</h1>
<hr/>

{!! Form::open(['action'=>'postController@store', 'method'=>'POST', 'files'=>true ]) !!}

  <div class="form-group">
    {{ Form::label('Title') }}
    {{ Form::text('title', '', [ 'placeholder'=>'Enter Post Title', 'class'=>'form-control' ]) }}
  </div>

  <div class="form-group">
    {{ Form::label('Body') }}
    {{ Form::textarea('body', '', [ 'placeholder'=>'Enter Post body', 'class'=>'form-control ckeditor' ]) }}
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
    {{ Form::label('Featured Image') }}
    {{ Form::file('photo', [ 'placeholder'=>'Select Featured Image', 'class'=>'form-control' ]) }}
  </div>

  <div class="form-group float-md-right">
    {{ Form::submit('save', ['class'=>'btn btn-primary'])}}
  </div>
{!! Form::close() !!}

@endsection
