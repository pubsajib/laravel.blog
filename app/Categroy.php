<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categroy extends Model
{
    // Since model name is different form DB name
	protected $table = 'categories';

	public function categroy()
	{
		return $this->belongsTo('App\Categroy');
	}
}
