@extends('layout')

@section ('content')
<div class="col-sm-8 blog-main">
<h1>Edit  your post</h1>
<form action="/updatepost/{{$post->id}}" method="post">
  {{csrf_field()}}
  <label>
  title:<input type="text" name="title" value="{{$post->title}}">
</label>
<label>
  body: <input type="text"  name="body" value="{{$post->body}}">
</label>


<button type="update" > update your post </button>
</form>
</div>
@endsection
