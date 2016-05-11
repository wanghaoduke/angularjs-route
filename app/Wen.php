<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wen extends Model
{
  
    //
  protected $fillable = ['title','text'];

  public function comments(){
    return $this->hasMany('App\comment');
  }
}
