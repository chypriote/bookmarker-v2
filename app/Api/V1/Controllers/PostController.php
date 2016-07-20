<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\Post;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
	use Helpers;

	public function index()
	{
		return Post::all();
	}

	public function show($id)
	{
		$post = Post::find($id);

		if(!$post)
			throw new NotFoundHttpException;

		return $post;
	}

	public function store(Request $request)
	{
		$post = new Post;

		$post->title = $request->get('title');
		$post->description = $request->get('description');

		if ($post->save())
			return $this->response->created();
		else
			return $this->response->error('could_not_create_post', 500);
	}

	public function update(Request $request, $id)
	{
		$post = Post::find($id);
		if(!$post)
			throw new NotFoundHttpException;

		$post->fill($request->all());

		if($post->save())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_update_post', 500);
	}

	public function destroy($id)
	{
		$post = Post::find($id);

		if(!$post)
			throw new NotFoundHttpException;

		if($post->delete())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_delete_post', 500);
	}
}
