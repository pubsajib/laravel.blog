<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class post extends Model
{
	protected $table = 'posts';
    
	public function category()
	{
		return $this->belongsTo(Category::class);
	}
	public function tag()
	{
		return $this->belongsToMany(Tag::class);
	}
	public function author()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
	public function comment()
	{
		return $this->belongsToMany(Comment::class);
	}
}
