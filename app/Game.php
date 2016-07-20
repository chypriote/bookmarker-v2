<?php

namespace App;


class Game extends Post
{

		protected static $singleTableType = 'game';

    protected static $persisted = ['link', 'size'];
}
