<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Category extends Model
{
    protected $fillable=['name','summary','status'];

    public function user(){
        return $this->hasOne(User::class,'id','added_by');
    }
}
