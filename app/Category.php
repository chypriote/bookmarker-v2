<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'name', 'slug',
	];

	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	public function tags()
	{
		return $this->hasManyThrough('App\Tag', 'App\Post');
	}
}