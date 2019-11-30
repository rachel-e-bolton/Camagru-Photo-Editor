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

    public function send_reset()
    {
        $data = $this->getJSON();

        if (!isset($data["email"]))
            RenderView::json([], 200, "No email specified.");

        $userModel = new UserModel();

        $user = $userModel->getUserByEmail($data["email"]);

        if (!$user)
            RenderView::json([], 200, "Could not send password reset email at this time.");    

        $hash = hash("sha256", date('mdY') . $user["handle"] . SALT);
        $link = SERVER_ADDRESS . "users/reset_password/" . $user["handle"] . "/" . $hash;

        if (Email::send_password_reset($user["first_name"], $user["email"], $link))
        {
            RenderView::json([], 200, "Password reset email sent.");
        }
        RenderView::json([], 200, "Could not send password reset email at this time.");
    }

    public function reset_password($kwargs)
    {
        if (isset($kwargs["params"]) && count($kwargs) == 2)
        {
            $handle = $kwargs["params"][0];
            $hash = $kwargs["params"][1];

            if (hash("sha256", date('mdY') . $handle . SALT) == $hash)
            {
                $_SESSION["valid_reset"] = $handle;
                RenderView::file("ResetPassword");
            }
            RenderView::file("404");
        }
    }

    public function update_password()
    {
        $data = $this->getJSON();

        if (!isset($_SESSION["valid_reset"]))
            RenderView::json([], 400, "Password cannot be blank");

        if (isset($data["password"]))
        {
            if (Validate::password($data["password"]) && $_SESSION["valid_reset"])
            {
                $handle = $_SESSION["valid_reset"];

                $userModel = new userModel();

                $user = $userModel->getUserByHandle($handle);

                $result = $userModel->updatePassword($user["id"], $data["password"]);

                if ($result->isValid())
                {
                    unset($_SESSION["valid_reset"]);
                    RenderView::json([], 200, "Password reset successfully.");
                }
                else
                    RenderView::json([], 400, "Could not update password.");
            }
            RenderView::json([], 400, "Password does not meet complexity requirements.");
        }
        RenderView::json([], 400, "Password cannot be blank");
    }
}