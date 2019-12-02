<?php

//require_once "./BaseProtectedController.php";

class HomeController extends BaseController
{
	public $allowedRoutes = [
        "default",
		"gallery",
		"send_mail"
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

	public function send_mail()
	{
		$data = $this->getJSON();

		if (!isset($data["email"]))
		{
			RenderView::json([], 400, "Valid email address is required");
		}

		$recipients = [ADMIN_EMAIL];

		foreach ($recipients as $email)
		{
			if ($data["type"] == "contact")
				$subject = "Camagru: Contact Us";
			else
				$subject = "Camagru: Issue Reported";
			$content = sprintf("
				<p>From : %s %s</p>
				<p>Subject : %s</p>
				<p>%s</p>
			", $data["email"], $data["handle"], $data["subject"], $data["message"]);

			if (Email::send_mail($email, $subject, $content))
				RenderView::json([], 200, "Mail sent.");
			else
				RenderView::json([], 400, "There was an issue sending the mail.");
		}
		RenderView::json([], 400, "Prerequisites not email, email not sent.");
	}
}