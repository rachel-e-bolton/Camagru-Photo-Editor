<?php

class BaseProtectedController extends BaseController
{
	public function __construct($name, $args)
	{
		// if user not auth here do something

		// die ('No-Auth Pls Fak off')
		parent::__construct($name, $args);
	}
}