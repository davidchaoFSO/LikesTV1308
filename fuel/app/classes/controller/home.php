<?php

class Controller_Home extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('home'=> 'active' );
		$this->template->title = 'Home';
		$this->template->content = View::forge('home/index', $data);
	}

}
