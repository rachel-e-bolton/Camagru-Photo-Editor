<?php 

class PostsController extends BaseController
{
	public function add()
	{
		$post = [
			"user_id" => 2,
			"image" => "some base64 shit",
			"comment" => "This is the first ever post created by your mom"
		];

		if ($this->model->create($post))
		{
			echo "added shit";
		}
		else
		{
			echo "shit was not added";
		}
	}

	public function get($kwargs)
	{

		$handle = $this->query_value($kwargs, "handle");
		$order = $this->query_value($kwargs, "order");

		echo json_encode($this->model->retrieve($handle, $order));
	}
}