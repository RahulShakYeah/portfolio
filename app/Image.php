<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Album;
class Image extends Model
{
    protected $fillable=['image'];

    public function album(){
        return $this->hasOne(Album::class,'id','album_id');
    }
}
