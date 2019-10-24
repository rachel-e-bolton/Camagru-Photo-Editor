<?php

include_once "BaseProtectedController.php";

class UsersController extends BaseProtectedController
{
    public function default()
    {
        // Get user info here from session cookie and then database
        $data = [
            "username" => "popo", 
            "reg_date" => "pepe",
            "email" => "dodo@dada.com"
        ];
        include_once dirname(__DIR__) . "/Views/UserHome.php";
    }

    public function create()
    {
        if ($_SERVER["method"] != "POST")
            return false;
               
    }

    public function get($id = NULL)
    {
        // Need a model
        echo "Method called boooi $id";
    }
}

