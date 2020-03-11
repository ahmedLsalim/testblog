@extends('layout')
@section('content')
<div class="col-sm-8 blog-main">

<h1>publish a post </h1>
<hr>
<form method="post" action="/posts" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="form-group row ">
    <label for="inputEmail3" class="col-sm-2 col-form-label"  >title</label>
      <input type="text" class="form-control" id="inputEmail3" name="title" >
     </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">body</label>
  <textarea id="body" name="body" class="form-control"></textarea>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">photo</label>
     <input type="file" name="fileToUpload" id="fileToUpload">
  </div>



  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">publish</button>
    </div>
  </div>
  @include('layouts.errors')
</form>
</div>
@endsection
