<?php 

class LoginController extends BaseController
{

	public function __construct($name, $args)
	{
        parent::__construct($name, $args);
        $GLOBALS["user"] = NULL;
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
                $user = $this->model->getUserByEmail($data["email"]);
                if ($user["verified"])
                {
                    $_SESSION["logged_in_uid"] = $data["email"];
                    RenderView::json(["session_id" => session_id()], 200);
                }
                else
                    RenderView::json([], 401, "Your account is not verified");    
            }
            else
				RenderView::json([], 401, "Authentication failed");
        }
        else
			RenderView::json([], 405, "Method not allowed");
    }
}