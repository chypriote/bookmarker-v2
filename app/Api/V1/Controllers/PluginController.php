<?php

namespace App\Api\V1\Controllers;

use JWTAuth;
use App\Plugin;
use App\Http\Requests;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PluginController extends Controller
{
	use Helpers;

	public function index()
	{
		return json_encode(Plugin::all());
	}

	public function show($id)
	{
		$plugin = Plugin::find($id);

		if(!$plugin)
			throw new NotFoundHttpException;

		return json_encode($plugin);
	}

	public function store(Request $request)
	{
		$plugin = new Plugin;

		$plugin->title = $request->get('title');
		$plugin->description = $request->get('description');
		$plugin->link = $request->get('link');

		if ($plugin->save())
			return $this->response->created();
		else
			return $this->response->error('could_not_create_plugin', 500);
	}

	public function update(Request $request, $id)
	{
		$plugin = Plugin::find($id);
		if(!$plugin)
			throw new NotFoundHttpException;

		$plugin->fill($request->all());

		if($plugin->save())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_update_plugin', 500);
	}

	public function destroy($id)
	{
		$plugin = Plugin::find($id);

		if(!$plugin)
			throw new NotFoundHttpException;

		if($plugin->delete())
			return $this->response->noContent();
		else
			return $this->response->error('could_not_delete_plugin', 500);
	}
}
