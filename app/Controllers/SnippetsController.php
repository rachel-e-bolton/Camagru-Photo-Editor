<?php

class SnippetsController extends BaseController
{
	function load($kwargs)
	{
		if (count($kwargs["params"]) > 0)
			RenderView::snippet($kwargs["params"][0]);
		RenderView::snippet("404");
	}
}