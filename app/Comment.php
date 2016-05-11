<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
  protected $fillable=['comm','user','wen_id'];

  public function wen(){
    return $this->belongsTo('App\Wen');
  }
}
