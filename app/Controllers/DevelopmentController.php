<?php

class DevelopmentController extends BaseController
{
	public function default()
	{
		RenderView::file("404");
	}

	public function view($args)
	{
		RenderView::file($args["params"][0]);
	}

	public function views($args)
	{
		RenderView::file($args["params"][0]);
	}
}