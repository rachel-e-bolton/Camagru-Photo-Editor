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
			$comments = (new CommentModel())->getCommentsByPostId($post["id"]);


			RenderView::snippet("ViewPost", ["post" => $post, "comments" => $comments]);
		}
		RenderView::snippet("404");
	}
}