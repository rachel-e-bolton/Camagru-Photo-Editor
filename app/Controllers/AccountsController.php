<?php

class AccountsController extends BaseProtectedController
{
	public function __construct($name, $args)
	{
		parent::__construct($name, $args);
		$this->model = new UserModel();
	}

	public function default()
	{
		RenderView::redirect("/");
	}

	public function edit()
	{
		RenderView::file("UserAccount");
	}

	public function update()
	{

	}
}