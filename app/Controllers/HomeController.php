<?php

//require_once "./BaseProtectedController.php";

class HomeController extends BaseController
{
	public $allowedRoutes = [
        "default",
        "gallery"
	];

	function default()
	{
		if (isset($_SESSION["logged_in_uid"]))
		{
			$user = $this->protectSelfHTML();
			RenderView::file("UserHome");
		}
		else
			RenderView::file("VisitorHome");
	}

	public function gallery($kwargs)
	{
		$this->protectSelfHTML();
		$model = new UserModel();

		if (count($kwargs["params"]) == 1)
		{
			$handle = $kwargs["params"][0];
			$reqUser = $model->getUserByHandle($handle);

			if ($reqUser)
				RenderView::file("OtherGallery", $reqUser);
			
			RenderView::redirect("/home/gellery");
		}

		RenderView::file("SiteGallery");
	}
}