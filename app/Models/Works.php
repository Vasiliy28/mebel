<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Works extends Model {

  protected $table = 'works';

  protected $fillable = [
    'slug',
    'title',
    'description',
    'images',
  ];

  protected $casts = [
    'images' => 'array',
  ];
}
