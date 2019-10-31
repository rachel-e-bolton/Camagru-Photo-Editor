<?php

//require_once "./BaseProtectedController.php";

class HomeController extends BaseController
{
	function default()
	{
		if (isset($_SESSION["logged_in_uid"]))
			RenderView::file("UserHome");
		else
			RenderView::file("VisitorHome");
	}
}