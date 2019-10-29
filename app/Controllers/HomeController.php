<?php

//require_once "./BaseProtectedController.php";

class HomeController extends BaseController
{
	function default()
	{
		if (isset($_SESSION["logged_in_uid"]))
		{
			echo "User logged in";
			RenderView::file("UserHome");
		}
		else
		{
			echo "User not logged in";
			RenderView::file("VisitorHome");
		}
	}
}