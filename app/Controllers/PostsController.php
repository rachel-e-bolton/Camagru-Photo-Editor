<?php 

class PostsController extends BaseController
{
	public function new_post()
	{
		RenderView::file("AddPost");
	}

	public function add()
	{
		$user = $this->protectSelfJSON();
		$data = $this->getJSON();
		if (!$data)
		{
			RenderView::json([], 400, "No data submitted");
			die();
		}

		$post = [];
		$post["user_id"] = $user["id"];
		$post["image"] = (new ImageStack($data["layers"], session_id()))->mergedImage64();
		$post["comment"] = $data["comment"];

		if ($this->model->create($post))
		{
			RenderView::json($user["handle"], 200, "Post added successfully.");
		}
		RenderView::json([], 400, "An error occurred.");

	}

	public function get($kwargs)
	{

		$start = $this->query_value($kwargs, "start");
		$handle = $this->query_value($kwargs, "handle");

		echo json_encode($this->model->retrieve($start, $handle));
	}

	public function toggle_like()
	{
		$model = new LikesModel();

		$user = $this->protectSelfJSON();
		$data = $this->getJSON();

		if (isset($data["post_id"]))
		{
			$result = $model->toggleLike($data["post_id"], $user["id"]);
			
			if ($result->isValid())
				RenderView::json([], 200, "Done.");
			else
				RenderView::json([], 400, $result->errorMessage());
		}
		else
			RenderView::json([], 400, "Missing data, cannot complete request.");
	}

	public function delete($kwargs)
	{
		$user = $this->protectSelfJSON();
		$post_id = (isset($kwargs["params"]) && count($kwargs["params"]) == 1) ? $kwargs["params"][0] : NULL;

		if ($post_id)
		{
			if (!ctype_digit($post_id))
				RenderView::json([], 400, "Post ID must be an integer.");

			$post = $this->model->getPostbyId($post_id);

			if (!$post)
				RenderView::json([], 400, "Post does not exist.");
		
			if ($post["user_id"] == $user["id"])
			{
				if ($this->model->deletePostById($post_id))
				{
					RenderView::json([], 200, "Post deleted.");
				}
				RenderView::json([], 400, "Post was not deleted.");
			}
			else
				RenderView::json([], 401, "Cannot delete this post, it does not belong to you.");
		}
		RenderView::json([], 400, "Missing post ID");
	}
}