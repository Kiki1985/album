<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function stickers()
    {
        return $this->hasMany(Sticker::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addSticker($i)
    {
        return Sticker::create([
                'album_id' => $this->id,
                'sticker_id' => $i
        ]);
    }
}
