<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\Framework;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class FrameworkController extends Controller
{
	use Helpers;

	public function index()
	{
		return Framework::all();
	}

	public function show($id)
	{
		$framework = Framework::find($id);

		if(!$framework)
			throw new NotFoundHttpException;

		return $framework;
	}

	public function store(Request $request)
	{
		$framework = new Framework;

		$framework->title = $request->get('title');
		$framework->description = $request->get('description');
		$framework->link = $request->get('link');

		if ($framework->save())
			return $this->response->created();
		else
			return $this->response->error('could_not_create_framework', 500);
	}

	public function update(Request $request, $id)
	{
		$framework = Framework::find($id);
		if(!$framework)
			throw new NotFoundHttpException;

		$framework->fill($request->all());

		if($framework->save())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_update_framework', 500);
	}

	public function destroy($id)
	{
		$framework = Framework::find($id);

		if(!$framework)
			throw new NotFoundHttpException;

		if($framework->delete())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_delete_framework', 500);
	}
}
