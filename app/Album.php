<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Album extends Model
{
    protected $fillable = ['name'];

    public function user(){
        return $this->belongsTo(User::class,'added_by');
    }
}
