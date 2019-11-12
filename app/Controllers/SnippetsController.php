<?php

class SnippetsController extends BaseController
{
	function load($kwargs)
	{
		if (count($kwargs["params"]) > 0)
			RenderView::snippet($kwargs["params"][0]);
		RenderView::snippet("404");
	}

	function post($kwargs)
	{
		if (count($kwargs["params"]) > 0)
		{
			$model = new PostModel();

			$post = $model->getPostbyId($kwargs["params"][0]);

			RenderView::snippet("ViewPost", $post);
		}
		RenderView::snippet("404");
	}
}