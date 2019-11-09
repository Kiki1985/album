<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sticker extends Model
{
  protected $guarded = [];
    public $timestamps = false;
    
    public function album()
    {
      return $this->belongsTo(Album::class);
    }
}
