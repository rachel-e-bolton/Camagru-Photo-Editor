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
        if ($this->model->handleExists($handle))
            (new ApiResonse("", 200))->send();
        else
            (new ApiResonse("", 500))->send();
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


class ApiResonse
{
    public $data;
    public $status_code;

    function __construct($data, $status_code)
    {
        $this->data = $data;
        $this->status_code = $status_code;
    }

    function send()
    {
        $response = [
            "status" => ($this->status_code < 299) ? true : false,
            "data" => $this->data
        ];

        echo json_encode($response);
    }
}

