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
            if ($this->model->authenticate($data["email"], $data["password"]))
            {
                $_SESSION["logged_in_uid"] = $data["email"];
                error_log("User {$data["email"]} authenticated");
				RenderView::json(["session_id" => session_id()], 200);
            }
            else
            {
                error_log("User {$data["email"]} failed to authenticate");
				RenderView::json([], 401);
            }
        }
        else
        {
            error_log("Method not allowed!");
			RenderView::json([], 405, "Method not allowed");
        }
    }
}