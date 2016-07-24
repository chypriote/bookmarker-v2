<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

	$api->post('auth/login', 'App\Api\V1\Controllers\AuthController@login');
	$api->post('auth/signup', 'App\Api\V1\Controllers\AuthController@signup');
	$api->post('auth/recovery', 'App\Api\V1\Controllers\AuthController@recovery');
	$api->post('auth/reset', 'App\Api\V1\Controllers\AuthController@reset');

	// example of protected route
	$api->get('protected', ['middleware' => ['api.auth'], function () {
		return \App\User::all();
    }]);

	// example of free route
	$api->get('free', function() {
		return \App\User::all();
	});

	//$api->group(['middleware' => 'api.auth'], function ($api) {
	$api->group([], function ($api) {
		$api->resource('categories', 'App\Api\V1\Controllers\CategoryController');
		$api->get('categories/{id}/posts', 'App\Api\V1\Controllers\CategoryController@posts');
		$api->get('categories/{id}/tags', 'App\Api\V1\Controllers\CategoryController@tags');

		$api->resource('posts', 'App\Api\V1\Controllers\PostController');

//		$api->resource('games', 'App\Api\V1\Controllers\GameController');
//		$api->resource('plugins', 'App\Api\V1\Controllers\PluginController');
//		$api->resource('frameworks', 'App\Api\V1\Controllers\FrameworkController');
		$api->resource('tags', 'App\Api\V1\Controllers\TagController');
		$api->get('tags/{id}/posts', 'App\Api\V1\Controllers\TagController@posts');
	});

});
