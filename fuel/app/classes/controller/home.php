<?php
require APPPATH.'facebook.php'; 
class Controller_Home extends Controller_Template
{

	public function action_index($redirect=array())
	{

		// Facebook app credentials

		require APPPATH.'likestv.php';

		$user = $facebook->getUser();
		$data = array();

		// The redirect is needed because facebook's logout url function doesn't actually clear session variables

		$sessionlogout = 'http://likestv.gopagoda.com/logout';

		if ($user) {

		  // If user is logged in, a logout URL needs to be set.

		  $data['logoutUrl'] = $facebook->getLogoutUrl( array('next' => $sessionlogout));

		  // If user is logged in, the "Connect" button reloads home page

		  $data['url'] = '';
		  try {

		    // Retrieve profile information since user is logged in
		    
		  	$data['user_profile'] = $facebook->api('/me');
		    
		    
		  } catch (FacebookApiException $e) {

		    error_log($e);
		    $user = null;

		  }

		} else {

		  // If user is not logged in, the "Connect" button becomes a login button
		  // Logins permissions include standard + user likes ONLY. If more permissions are needed, it needs to be set here

		  $data['url'] = $facebook->getLoginUrl(array('scope'=>'user_likes'));

		}

		$data['user'] = $user;
		$data["subnav"] = array('home'=> 'active' );
		$this->template->title = 'Find live streams of your favorite video games | Powered by Twitch and Facebook';
		$this->template->content = View::forge('home/index', $data);
	}

}
