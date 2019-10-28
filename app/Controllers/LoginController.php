<?php

include_once "BaseController.php";

class LoginController extends BaseController
{
    public function default()
    {
        include_once dirname(__DIR__) . "/Views/Login.php";
    }

    // Set session

}