<?php

include_once "BaseProtectedController.php";

class UsersController extends BaseController
{
    public function default()
    {
        include_once dirname(__DIR__) . "/Views/UserHome.php";
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