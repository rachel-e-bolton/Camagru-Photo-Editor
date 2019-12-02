<?php

class StickersController extends BaseController
{
	public $allowedRoutes = [
        "default",
		"get_all"
	];

	public function default()
	{
		RenderView::redirect("/");
	}

	public function get_all()
	{
		$this->protectSelfJSON();
		$stickers = $this->model->getAll();

		if ($stickers)
			RenderView::json($stickers, 200);
		else
			RenderView::json([], 400, "No stickers were found");
	}
}