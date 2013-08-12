<?php

class Controller_Logout extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('logout'=> 'active' );
		$this->template->title = 'Logout';
		$this->template->content = View::forge('logout/index', $data);
	}

}
