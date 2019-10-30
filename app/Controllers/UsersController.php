<?php

include_once "BaseProtectedController.php";

class UsersController extends BaseController
{
    public function default()
    {
        include_once dirname(__DIR__) . "/Views/UserHome.php";
    }

    public function authenticate()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {   
            $data = json_decode(file_get_contents('php://input'), true);
            if ($this->model->authenticate($data["username"], $data["password"]))
            {
                $_SESSION["logged_in_uid"] = $data["username"];
                $response = new ApiResonse(["session_id" => session_id()], 200);
            }
            else
                $response = new ApiResonse("Failed", 500);
            $response->send();
        }
        else
        {
            $response = new ApiResonse(["error" => "method {$_SERVER['REQUEST_METHOD']} not allowed"], 500);
            $response->send();
        }
    }

    public function handleExists($handle)
    {
        $handle = $handle["params"][0];

        if ($this->model->handleExists($handle))
            RenderView::json([], 200, "Handle aavailable");
        else
            RenderView::json([], 400, "Handle exists");
    }

    public function logout()
    {
        $_SESSION = array();
        header("Location: /");
        die();
    }

    // JSON endpoint
    public function get($id = NULL)
    {
        $db = $this->model->getDB();
        $stmt = $db->prepare("SELECT * from users");
        $stmt->execute();
        $users = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        echo json_encode($users);
    }
}