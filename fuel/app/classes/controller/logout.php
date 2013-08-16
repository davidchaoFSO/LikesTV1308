<?php

class Controller_Logout extends Controller_Template
{

	public function action_index()
	{
		session_start();
		$_SESSION = array();
		session_destroy();
		Session::set_flash('success', 'Logged out successfully!');
		
		$data["subnav"] = array('logout'=> 'active' );
		$this->template->title = 'Logout';
		$this->template->content = View::forge('logout/index', $data);
		Response::redirect('home');
	}

}
