<?php 

class SignupController extends BaseController
{

	public function __construct($name, $args)
	{
		parent::__construct($name, $args);
		$this->model = new UserModel();
	}

	public function default()
	{
		RenderView::file("Login");
	}
}