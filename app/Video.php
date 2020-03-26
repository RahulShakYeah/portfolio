<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['title','summary','video_link'];

    public function getYoutubeVideoId($link){
        preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#",$link,$match);
        if(isset($match)){
            return $match[2];
        }else{
            return false;
        }
    }

    public function user(){
        return $this->belongsTo(User::class,'added_by');
    }
}
