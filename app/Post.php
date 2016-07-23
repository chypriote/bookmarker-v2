<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class Post extends Model
{
	use SingleTableInheritanceTrait;

	protected $table = "posts";

	protected static $singleTableTypeField = 'type';

	protected static $singleTableSubclasses = [Game::class, Plugin::class, Framework::class];

	protected static $persisted = ['title', 'description', 'picture'];

	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}
	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}
