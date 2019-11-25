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
			$data = $this->getJSON();
			if (!$data)
			{
				RenderView::json([], 400, "Failed to create user");
				die();
			}
			if ($this->model->create($data))
			{
				$user = $this->model->getUserByEmail($data["email"]);
				
				$link = SERVER_ADDRESS . "users/verify/" . $user["id"] . "/" . hash("sha256", $data["email"] . SALT);
				$name = $user["first_name"];
				Email::send_verification_email($name, $user["email"], $link);

				RenderView::json([], 200, "User created successfully, please check your email to verify your account");
			}
			else
				RenderView::json([], 400, "Failed to create user");
		}
		else
		{
			RenderView::json([], 400, "method {$_SERVER['REQUEST_METHOD']} not allowed");
		}
	}
}