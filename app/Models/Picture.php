<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
  protected $fillable = [
      'user_id', 'link', 'location', 'name', 'tag', 'description', 'type',
  ];
}
