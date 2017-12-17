<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $table = 'comments';

	public function post() {
		return $this->belongsTo(Post::class);
	}
	public function author() {
		return $this->belongsTo(User::class, 'user_id');
	}
}