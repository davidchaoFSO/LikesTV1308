<?php
require APPPATH.'facebook.php'; 
class Controller_About extends Controller_Template
{

	public function action_index()
	{
		// Facebook app credentials

		$facebook = new Facebook(array(
		  'appId' => '515649145162571',
		  'secret' => '46c7fe25ef7c1c7e03059024049d676f',
		));

		$user = $facebook->getUser();

		$data = array();
		$sessionlogout = 'http://likestv.gopagoda.com/logout';

		if ($user) {

		  $data['logoutUrl'] = $facebook->getLogoutUrl( array('next' => $sessionlogout));

		}
		$data['user'] = $user;
		$data["subnav"] = array('about'=> 'active' );
		$this->template->title = 'About LikesTV';
		$this->template->content = View::forge('about/index', $data);
	}

}
