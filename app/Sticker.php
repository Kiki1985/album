<?php

namespace App;

class Sticker extends Model
{
    

    public function album()
    {
    	return $this->hasOne(Album::class);
    }
}
