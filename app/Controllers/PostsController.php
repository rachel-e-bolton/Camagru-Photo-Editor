<?php 

class PostsController extends BaseController
{
	public function add()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if (!$data)
		{
			RenderView::json([], 400, "Failed to create user");
			die();
		}
	
		if (count($data) > 0)
		{
			foreach ($data as $dataUrl)
			{
				$split = explode("base64,", $dataUrl)[1];
				echo $split;
			}
		}

//		print_r($data);
	}

	public function get($kwargs)
	{

		$handle = $this->query_value($kwargs, "handle");
		$order = $this->query_value($kwargs, "order");

		echo json_encode($this->model->retrieve($handle, $order));
	}
}