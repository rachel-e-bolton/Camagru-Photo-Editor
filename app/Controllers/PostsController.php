<?php 

class PostsController extends BaseController
{
	public function add()
	{
		$this->protectSelfJSON();
		$data = json_decode(file_get_contents('php://input'), true);
		if (!$data)
		{
			RenderView::json([], 400, "No data submitted");
			die();
		}

		if (count($data) > 0)
		{
			$post = [];
			$post["user_id"] = $this->user["id"];
			$post["image"] = (new ImageStack($data["layers"], session_id()))->mergedImage64();
			$post["comment"] = $data["comment"];

			if ($this->model->create($post))
			{
				RenderView::json($post, 200, "Post added successfuly");
			}
			RenderView::json([], 400, "An error occured");
		}
	}

	public function get($kwargs)
	{

		$handle = $this->query_value($kwargs, "handle");
		$order = $this->query_value($kwargs, "order");

		echo json_encode($this->model->retrieve($handle, $order));
	}
}