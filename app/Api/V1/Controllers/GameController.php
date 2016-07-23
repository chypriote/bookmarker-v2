<?php

namespace App\Api\V1\Controllers;

use App\Category;
use JWTAuth;
use App\Game;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GameController extends Controller
{
	use Helpers;

	public function index()
	{
		return Game::all();
	}

	public function show($id)
	{
		$game = Game::find($id);

		if(!$game)
			throw new NotFoundHttpException;

		return $game;
	}

	public function store(Request $request)
	{
		$game = new Game;

		$game->title = $request->get('title');
		$game->description = $request->get('description');
		$game->picture = $request->get('picture');
		$game->link = $request->get('link');
		$game->size = $request->get('size');

		$category = Category::find($request->get('category_id'));
		if (!$category)
			return $this->response->error('category_not_found', 400);

		$game->category_id = $category->id;
		if ($category->posts()->save($game))
			return $this->response->created();
		else
			return $this->response->error('could_not_create_game', 500);
	}

	public function update(Request $request, $id)
	{
		$game = Game::find($id);
		if(!$game)
			throw new NotFoundHttpException;

		$game->fill($request->all());

		if($game->save())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_update_game', 500);
	}

	public function destroy($id)
	{
		$game = Game::find($id);

		if(!$game)
			throw new NotFoundHttpException;

		if($game->delete())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_delete_game', 500);
	}
}
