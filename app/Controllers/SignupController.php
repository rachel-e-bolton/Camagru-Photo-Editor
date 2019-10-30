<?php 

class SignupController extends BaseController
{
	public function default()
	{
		RenderView::file("SignUp");
	}
}