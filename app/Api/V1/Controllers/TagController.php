<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\Tag;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TagController extends Controller
{
	use Helpers;

	public function index()
	{
		return Tag::all();
	}

	public function show($id)
	{
		$tag = Tag::find($id);

		if(!$tag)
			throw new NotFoundHttpException;

		return $tag;
	}

	public function store(Request $request)
	{
		$tag = new Tag;

		$tag->name = $request->get('name');
		$tag->slug = $request->get('slug');

		if ($tag->save())
			return $this->response->created();
		else
			return $this->response->error('could_not_create_tag', 500);
	}

	public function update(Request $request, $id)
	{
		$tag = Tag::find($id);
		if(!$tag)
			throw new NotFoundHttpException;

		$tag->fill($request->all());

		if($tag->save())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_update_tag', 500);
	}

	public function destroy($id)
	{
		$tag = Tag::find($id);

		if(!$tag)
			throw new NotFoundHttpException;

		if($tag->delete())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_delete_tag', 500);
	}

	public function posts($id)
	{
		$tag = Tag::where('slug', $id)->first();
		$posts = $tag->posts()->get();

		if(!$tag)
			return $this->response->error('could_not_find_category', 400);

		return $posts;
	}
}
