<?php

namespace App;


class comments extends Model
{
  public function post(){

    return $this->belongsTo(post::class);

  }

    public function user(){

      return $this->belongsTo(user::class);

    }
}
