<?php

namespace App\Models;

class Examples extends BaseModel
{
  const TITLE = 'title';
  const DESC = 'desc';
  const PATH = 'path';

  protected $table = 'examples';

  protected $fillable = [
    self::TITLE,
    self::DESC,
    self::PATH,
  ];

  protected $casts = [
    self::PATH => 'array',
  ];
}
