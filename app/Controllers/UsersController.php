<?php

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
        RenderView::redirect("/");
    }

    public function verify($kwargs)
    {
        $user_id = $kwargs["params"][0];
        $hash = $kwargs["params"][1];
        $user = $this->model->getUserById($user_id);

        if ($user)
        {
            if (hash("sha256", $user["email"] . SALT) == $hash)
            {
                $this->model->verifyUserById($user["id"]);
                RenderView::redirect("/login");
            }
            RenderView::file("404");
        }
        else
        {
            RenderView::file("404");
        }
    }

    public function reset_password($kwargs)
    {
        
    }

}