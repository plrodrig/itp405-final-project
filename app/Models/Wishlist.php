<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
  protected $fillable = [
      'user_id', 'type',
  ];
  public function user()
  {
     return $this->belongsTo('App\Models\User');
  }

  public function pictures(){
    return $this->hasMany('App\Model\Picture');
  }

}
