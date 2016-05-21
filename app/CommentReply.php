<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = ['name','email', 'body', 'is_active', 'comment_id', 'user_photo'];

    public function comment(){
    	return $this->belongsTo('App\Comment');
    }
}
