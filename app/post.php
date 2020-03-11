<?php

namespace App;
use Auth;
class post extends Model
{




  protected $fillable = ['body', 'title','user_id','image'];
  public function comments(){

     return $this->hasMany(comments::class);
  }
  public function user(){

    return $this->belongsTo(user::class);

  }
  public function addComment($body)
  {
    //$this->comments()->create(compact('body'));
    comments::create([
    'body'=>$body,
    'post_id'=>$this->id,
    'user_id'=> Auth::user()->id
   ]);
  }
  public function tags()
  {
  return $this->belongsToMany(Tag::class);
  }
  public static function archives(){
  return  Post::selectRaw('year(created_at)year,monthname(created_at)month,count(*)published')
    ->groupBY('year','month')
    ->orderByRaw('min(created_at)')
    ->get()
    ->toArray();

  }
}
