<?php

class SnippetsController extends BaseController
{
	function load($kwargs)
	{
		RenderView::snippet($kwargs["params"][0]);
	}
}