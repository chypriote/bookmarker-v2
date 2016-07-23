<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

class Post extends Model
{
		use SingleTableInheritanceTrait;

		protected $table = "posts";

		protected static $singleTableTypeField = 'category';

		protected static $singleTableSubclasses = [Game::class, Plugin::class];

    protected static $persisted = ['title', 'description', 'picture'];
}
