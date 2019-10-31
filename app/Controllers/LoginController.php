<?php 

class LoginController extends BaseController
{

	public function __construct($name, $args)
	{
		parent::__construct($name, $args);
		$this->model = new UserModel();
	}

	public function default()
	{
		RenderView::file("Login");
	}

	public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {   
            $data = json_decode(file_get_contents('php://input'), true);
            if ($this->model->authenticate($data["username"], $data["password"]))
            {
                $_SESSION["logged_in_uid"] = $data["username"];
				RenderView::json(["session_id" => session_id()], 200);
            }
            else
				RenderView::json([], 400);
        }
        else
        {
			RenderView::json([], 400, "Method not allowed");
        }
    }
}