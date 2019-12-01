<?php

class SnippetsController extends BaseController
{
	public $allowedRoutes = [
        "load",
		"post"
	];

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
			$likes = new LikesModel();
			$logged_in = null;

			if (isset($_SESSION["logged_in_uid"]))
				$logged_in = (new UserModel())->getUserByEmail($_SESSION["logged_in_uid"]);
			
			$post = $model->getPostbyId($kwargs["params"][0]);
			
			$comments = (new CommentModel())->getCommentsByPostId($post["id"]);
			
			$liked = ($logged_in) ? $likes->isLiked($post["id"], $logged_in["id"]) : null;

			RenderView::snippet("ViewPost", ["post" => $post, "comments" => $comments, "liked" => $liked]);
		}
		RenderView::snippet("404");
	}
}