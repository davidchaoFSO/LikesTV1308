<?php

class Controller_Contact extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('contact'=> 'active' );
		$this->template->title = 'Contact Us';
		$this->template->content = View::forge('contact/index', $data);
	}

}
