<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends Controller
{
	use Helpers;

	public function index()
	{
		$categories = Category::all();

		return json_encode($categories);
	}

	public function show($id)
	{
		$category = Category::find($id);

		if(!$category)
			throw new NotFoundHttpException;

		return json_encode($category);
	}

	public function store(Request $request)
	{
			$category = new Category;

			$category->name = $request->get('name');
			$category->slug = $request->get('slug');
			$category->icon = $request->get('icon');
			$category->color = $request->get('color');

			if ($category->save())
				return $this->response->created();
			else
				return $this->response->error('could_not_create_category', 500);
	}

	public function update(Request $request, $id)
	{
		$category = Category::find($id);
		if(!$category)
			throw new NotFoundHttpException;

		$category->fill($request->all());

		if($category->save())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_update_category', 500);
	}

	public function destroy($id)
	{
		$category = Category::find($id);

		if(!$category)
			return $this->response->error('could_not_find_category', 400);

		if($category->delete())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_delete_category', 500);
	}

	public function posts($id)
	{
		$category = Category::where('slug', $id)->first();
		$posts = $category->posts()->get();

		if(!$category)
			return $this->response->error('could_not_find_category', 400);

		return $posts;
	}

	public function tags($id)
	{
		$category = Category::find($id);

		if(!$category)
			return $this->response->error('Category not found', 400);

		$tags = $category->tags()->get();
		return $tags;
	}
}
