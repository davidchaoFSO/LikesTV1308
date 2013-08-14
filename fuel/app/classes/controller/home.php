<?php
require APPPATH.'facebook.php'; 
class Controller_Home extends Controller_Template
{

	public function action_index($redirect=array())
	{

		$facebook = new Facebook(array(
		  'appId' => '515649145162571',
		  'secret' => '46c7fe25ef7c1c7e03059024049d676f',
		));

		$user = $facebook->getUser();
		$data = array();

		// The redirect is needed because facebook's logout url function doesn't actually clear session variables

		$sessionlogout = 'http://localhost:8888/likestv/public/logout';

		if ($user) {

		  $data['logoutUrl'] = $facebook->getLogoutUrl( array('next' => $sessionlogout));

		  try {

		    // Retrieve profile information since user is logged in
		  	$data['user_profile'] = $facebook->api('/me');
		    
		    
		  } catch (FacebookApiException $e) {

		    var_dump($e);
		    $user = null;

		  }

		} else {
		  $data['loginUrl'] = $facebook->getLoginUrl(array('scope'=>'user_likes'));
		}

		$data['user'] = $user;
		$data["subnav"] = array('home'=> 'active' );
		$this->template->title = 'Home';
		$this->template->content = View::forge('home/index', $data);
	}

}
