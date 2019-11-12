<?php

/**
 * Base Controller class, the father of all controllers
 */
class BaseController 
{
	protected $args;
	public $model;

	public function __construct($name, $args)
	{
		$this->args = $args;
		// Get Model here and assign to private? I dunno

		$potentialModelName = ucwords(rtrim($name, "s")) . "Model";

		if (class_exists($potentialModelName))
			$this->model = new $potentialModelName();
		else
			$this->model = new BaseModel();
	}

	public function default()
	{
		// Render default View here
		include_once dirname(__DIR__) . "/Views/VisitorHome.php";
	}

	public function notFound()
	{
		RenderView::file("404");
	}

	public function query_value($kwargs, $entry)
	{
		return (isset($kwargs["query"][$entry])) ? $kwargs["query"][$entry] : NULL;
	}

	public function protectSelfHTML() 
	{
		if (!isset($_SESSION["logged_in_uid"]))
			RenderView::redirect("/login");

		$GLOBALS["user"] = (new UserModel())->getUserByEmail($_SESSION["logged_in_uid"]);
	}

	public function protectSelfJSON() 
	{
		if (!isset($_SESSION["logged_in_uid"]))
			RenderView::json([], 401, "You are not authorised to use this resource.");

		$GLOBALS["user"] = (new UserModel())->getUserByEmail($_SESSION["logged_in_uid"]);
	}
}