<?php

namespace App\Models;


use Cviebrock\EloquentSluggable\Sluggable;

class Works extends BaseModel {

  use Sluggable;
  protected $table = 'works';

  protected $fillable = [
    self::TITLE,
    self::DESC,
    self::IMAGE,
  ];

  protected $casts = [
    self::IMAGE => 'array',
  ];


  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  public function sluggable() {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }

  public function examples() {
    return $this->hasMany('App\Models\Examples','entity_id');
  }
}
