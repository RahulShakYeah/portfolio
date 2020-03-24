<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
class Blog extends Model
{
    protected $fillable = ['title','description','summary','status'];

    public function user(){
        return $this->hasOne(User::class,'id','added_by');
    }

    public function category(){
        return $this->hasOne(Category::class,'id','cat_id');
    }
}
