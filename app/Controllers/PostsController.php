<?php 

class PostsController extends BaseController
{
	public function add()
	{
		$this->protectSelfJSON();
		$data = $this->getJSON();
		if (!$data)
		{
			RenderView::json([], 400, "No data submitted");
			die();
		}

		$post = [];
		$post["user_id"] = $this->user["id"];
		$post["image"] = (new ImageStack($data["layers"], session_id()))->mergedImage64();
		$post["comment"] = $data["comment"];

		if ($this->model->create($post))
		{
			RenderView::json($post, 200, "Post added successfully.");
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
}