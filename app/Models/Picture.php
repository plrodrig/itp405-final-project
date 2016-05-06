<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
  protected $fillable = [
      'user_id', 'link', 'location', 'name', 'tag', 'description', 'list_id',
  ];

  public function wishlist()
  {
     return $this->belongsTo('App\Models\Wishlist');
  }
}
