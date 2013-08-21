<?php
require APPPATH.'facebook.php'; 
class Controller_Testimonials extends Controller_Template
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
		$sessionlogout = 'http://localhost:8888/likestv/public/logout';

		if ($user) {

		  $data['logoutUrl'] = $facebook->getLogoutUrl( array('next' => $sessionlogout));

		}
		$data['user'] = $user;
		$data["subnav"] = array('testimonials'=> 'active' );
		$this->template->title = 'Testimonials';
		$this->template->content = View::forge('testimonials/index', $data);
	}

}
