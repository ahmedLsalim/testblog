<?php

namespace App\Http\Controllers;


 use App\Post;
  use App\comments;
class commentsController extends Controller
{
  public function store(Post $post)
  {
    $post->addComment(request('body'));
    return back();
  }
  public function delete($id)
  {

    $comments= comments::find($id);
    $comments->delete($id);
    return redirect('/');
  }
}
