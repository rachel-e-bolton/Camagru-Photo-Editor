<?php

class StickersController extends BaseProtectedController
{
	public function default()
	{
		RenderView::redirect("/");
	}

	public function get_all()
	{
		$stickers = $this->model->getAll();

		if ($stickers)
			RenderView::json($stickers, 200);
		else
			RenderView::json([], 400, "No stickers were found");
	}
}