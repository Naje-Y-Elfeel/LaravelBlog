@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  Dashboard
                  <div class="btn-group float-right">
                    <a href="/blog/public/posts/create">
                       Add New Post
                    </a>
                  </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3>Your Posts</h3>
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Tilte</th>
                          <th>Created</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($posts as $post)
                          <tr>
                            <td>{{ $post->title}}</td>
                            <td>{{ $post->created_at}}</td>

                            <td>
                              <a href="/blog/public/posts/{{ $post->id }}/edit" class="btn btn-info btn-sm">
                                Edit Post
                              </a>
                            </td>

                            <td>
                              {!! Form::open(['action'=>['postController@destroy', $post->id ] , 'method'=>'POST']) !!}

                                  {{ Form::hidden('_method', 'DELETE') }}
                                  <button type="submit" class="btn btn-danger btn-sm">DELETE POST</button>

                              {!! Form::close() !!}
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
