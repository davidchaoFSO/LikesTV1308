<?php
require_once APPPATH.'facebook.php';
class Controller_Channels extends Controller_Template
{

	public function action_index()
	{
		$facebook = new Facebook(array(
	  	'appId' => '515649145162571',
	  	'secret' => '46c7fe25ef7c1c7e03059024049d676f',
		));

		$user = $facebook->getUser();

		if ($user){

		try {

		// Retrieve profile information since user is logged in
			$user_profile = $facebook->api('/me');
		  
		  
		} catch (FacebookApiException $e) {

		  error_log($e);
		  $user = null;

		}
	}
		$data['preferences'] = Model_Preference::find('all', array(
		    'where' => array(array('username', $user_profile["username"]),),
		    'order_by' => array('updated_at' => 'desc'),));	

		$data["subnav"] = array('channels'=> 'active' );
		$this->template->title = 'Your Recommended Channels';
		$this->template->content = View::forge('channels/index', $data);
	}

}
