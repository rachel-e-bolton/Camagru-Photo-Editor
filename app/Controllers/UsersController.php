<?php

include_once "BaseProtectedController.php";

class UsersController extends BaseController
{
    public function default()
    {
        include_once dirname(__DIR__) . "/Views/UserHome.php";
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {   
            $data = json_decode(file_get_contents('php://input'), true);
            if ($this->model->authenticate($user, $pass))
                $response = new ApiResonse($data, 200);
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

    // JSON endpoint
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            
            $data = json_decode(file_get_contents('php://input'), true);
            if ($this->model->create($data))
                $response = new ApiResonse($data, 200);
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
            "status" => true,
            "data" => $this->data
        ];

        echo json_encode($response);
    }
}

