@extends('layouts.app')

@section('content')
<h1>Contact Us</h1>
<form>
  <div class="form-group">
    <label for="formGroupExampleInput">Name:</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your name here please">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Email:</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Your email">
  </div>

  <div class="form-group">
    <label for="formGroupExampleInput2">Comment:</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Write your comments here">
  </div>

  <div class="form-group">
    <button type="button" class="btn btn-primary">Send</button>
  </div>
</form>
@endsection
