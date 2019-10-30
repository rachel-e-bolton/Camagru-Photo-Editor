<?php 

class SignupController extends BaseController
{

	public function __construct($name, $args)
	{
		parent::__construct($name, $args);
		$this->model = new UserModel();
	}

	public function default()
	{
		RenderView::file("SignUp");
	}

	// JSON endpoint
	public function create()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data = json_decode(file_get_contents('php://input'), true);
			if (!$data)
			{
				RenderView::json([], 400, "Failed to create user");
				die();
			}
			if ($this->model->create($data))
				RenderView::json([], 200, "User created successfully");
			else
				RenderView::json([], 400, "Failed to create user");
		}
		else
		{
			RenderView::json([], 500, "method {$_SERVER['REQUEST_METHOD']} not allowed");
		}
	}
}