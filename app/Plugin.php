<?php

namespace App;


class Plugin extends Post
{
	protected static $singleTableType = 'plugin';

	protected static $persisted = ['link'];
}
