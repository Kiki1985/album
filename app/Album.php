<?php

namespace App;

class Album extends Model
{
    

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function stickers()
    {
    	return $this->hasOne(Sticker::class);
    }
}
