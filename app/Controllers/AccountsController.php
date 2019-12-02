<?php

class AccountsController extends BaseController
{
	public $allowedRoutes = [
		"default",
		"edit",
		"update_email",
		"update_notifications",
		"update_password",
		"update_details",
		"delete"
	];

	public function __construct($name, $args)
	{
		parent::__construct($name, $args);
		$this->model = new UserModel();
	}

	public function default()
	{
		$this->protectSelfHTML();
		RenderView::redirect("/accounts/edit");
	}

	public function edit()
	{
		$this->protectSelfHTML();
		RenderView::file("UserAccount");
	}

	public function update_email()
	{
		$user = $this->protectSelfJSON();
		$data = $this->getJSON();

		if (!isset($data["new-email"]))
			RenderView::json([], 400, "Not new email specified.");

		$email = filter_var($data["new-email"], FILTER_VALIDATE_EMAIL);
		if ($email)
		{
			if ($data["new-email"] == $user["email"])
				RenderView::json([], 400, "Specified email is the same as the old one.");

			$resp = $this->model->updateEmail($user["id"], $email);

			if ($resp->isValid())
			{
				$link = SERVER_ADDRESS . "users/verify/" . $user["id"] . "/" . hash("sha256", $data["new-email"] . SALT);
				Email::send_verification_email($user["first_name"], $email, $link);
				$_SESSION = array();
				RenderView::json([], 200, "Emali changed, please verify your new email address.");
			}
			else
				RenderView::json([], 400, $resp->errorMessage());
		}
		else
			RenderView::json([], 400, "Email address is not valid.");
	}
	
	public function update_notifications()
	{
		$user = $this->protectSelfJSON();
		$data = $this->getJSON();

		if (isset($data["answer"]) && $data["answer"])
		{
			$this->model->updateNotifications($user["id"], TRUE);
			RenderView::json([], 200, "Notifications for posts is on.");
		}
		else
		{
			$this->model->updateNotifications($user["id"], FALSE);
			RenderView::json([], 200, "Notifications for posts is off.");
		}
	}
	
	public function update_password()
	{
		$user = $this->protectSelfJSON();
		$data = $this->getJSON();

		if (isset($data["old-password"]) && isset($data["new-password"]))
		{	
			if ($this->model->authenticate($user["email"], $data["old-password"]))
			{
				if (!Validate::password($data["new-password"]))
					RenderView::json([], 400, "New password does not meet complexity requirements.");

				$this->model->updatePassword($user["id"], $data["new-password"]);
				RenderView::json([], 200, "Password updated successfully.");
			}
			else
			{
				RenderView::json([], 400, "Password incorrect.");
			}
		}
		else
			RenderView::json([], 400, "Missing data, cannot complete request.");
	}

	public function update_details()
	{
		$user = $this->protectSelfJSON();
		$data = $this->getJSON();

		if (!isset($data["new-handle"]))
			RenderView::json([], 400, "Handle cannot be blank.");
		if (!isset($data["new-firstname"]))
			RenderView::json([], 400, "First name cannot be blank.");
		if (!isset($data["new-lastname"]))
			RenderView::json([], 400, "Last name cannot be blank.");

		$response = $this->model->updateDetails($user["id"], $data["new-handle"], $data["new-firstname"], $data["new-lastname"]);

		if ($response->isValid())
			RenderView::json([], 200, "Details updated successfully.");
		else
			RenderView::json([], 400, $response->errorMessage());
	}

	public function delete()
	{
		$user = $this->protectSelfJSON();
		$data = $this->getJSON();

		if (isset($data["account-password"]))
		{
			if (!$this->model->authenticate($user["email"], $data["account-password"]))
				RenderView::json([], 400, "Account password is invalid.");

			$response = $this->model->deleteUserById($user["id"]);

			if ($response->isValid())
			{
				$_SESSION = array();
				RenderView::json([], 200, "Account has been deleted");
			}
			else
				RenderView::json([], 400, $response->errorMessage());
			
		}
		else
			RenderView::json([], 400, "Missing data cannot complete request.");
	}
}