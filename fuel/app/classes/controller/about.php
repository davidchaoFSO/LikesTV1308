<?php

class Controller_About extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('about'=> 'active' );
		$this->template->title = 'About LikesTV';
		$this->template->content = View::forge('about/index', $data);
	}

}
