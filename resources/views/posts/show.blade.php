@extends ('layout')
@section ('content')
<div class="col-sm-8 blog-main">

<h1>{{$post->title}}</h1>

{{$post->body}} <br>
    
     <img src="{{url('storage/'.$post->image)}}"/>

<hr>
@if(Auth::user())
@if(Auth::user()->id == $post->user_id)
<form action="/posts/{{$post->id}}/delete" method="post">
  {{csrf_field()}}
  <button    class="depost" type="delete" name="depost">delete</button>
</form>
 @endif
 @endif

 @if(Auth::user())
 @if(Auth::user()->id == $post->user_id)
 <form  action="/editpost/{{$post->id}}" method="post">
   {{csrf_field()}}
   <button    class="depost3" type="edit" name="edpost">Edit post</button>
 </form>
 @endif
 @endif

    <div class="comments">
      <ul class="list-group">
      @foreach ($post->comments as $comment)
      <li class="list-group-item">
        {{$comment->body }}
        <form action="/deleteComent/{{$comment->id}}" method="post">
          {{csrf_field()}}
          <button  class="depost2" type="delete" name="depost" >delete</button>
        </form>
      </li>
      @endforeach
</ul>
<hr>
    </div>
    <div class="card">
      <div class="card-block">
        @if(Auth::user())
           <form method="POST" action="/posts/{{$post->id}}/comments">
             {{csrf_field()}}

             <div class="form-group">
                <textarea name="body" placeholder="your.. comment here" class="form-control">
                    </textarea>
             </div>
             <div class="form-group">
               <button type="submit"  class="btn btn-primary">Add comment</button>
             </div>
           </form>
           @else
           <h1>please login to add comment</h1>
           <a href="http://localhost:8000/login"> login</a>
           @endif
      </div>
    </div>

</div>
@endsection
