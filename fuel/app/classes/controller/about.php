<?php
require APPPATH.'facebook.php'; 
class Controller_About extends Controller_Template
{

	public function action_index()
	{
		// Facebook app credentials

		require APPPATH.'likestv.php';

		$user = $facebook->getUser();

		$data = array();
		$sessionlogout = 'http://likestv.gopagoda.com/logout';

		// If user is logged in:
		if ($user) {

		  // Logout url set for navbar
		  $data['logoutUrl'] = $facebook->getLogoutUrl( array('next' => $sessionlogout));

		}
		$data['user'] = $user;
		$data["subnav"] = array('about'=> 'active' );
		$this->template->title = 'About LikesTV';
		$this->template->content = View::forge('about/index', $data);
	}

}
