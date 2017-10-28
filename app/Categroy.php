<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categroy extends Model
{
    // Since model name is different form DB name
	protected $table = 'categories';

	public function posts()
	{
		return $this->hasMany(Post::class);
	}
}
