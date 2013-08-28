<?php

require_once APPPATH.'facebook.php';

class Controller_Preferences extends Controller_Template{

	public function action_index()
	{
		require APPPATH.'likestv.php';

		// Grabs facebook user, if it exists. This is a check to see if user is logged in
		$user = $facebook->getUser();
		$data = array();
		$sessionlogout = 'http://likestv.gopagoda.com/logout';

		// If user is logged in:
		if ($user){

		// Sets logout url for navbar
		$data['logoutUrl'] = $facebook->getLogoutUrl( array('next' => $sessionlogout));

		try {

		// Retrieve profile information since user is logged in
			$user_profile = $facebook->api('/me');
		  
		  
		} catch (FacebookApiException $e) {

		  error_log($e);
		  $user = null;

		}

		// Fetches all games in DB that current user has filtered in database	
		$data['preferences'] = Model_Preference::find('all', array(
		    'where' => array(array('username', $user_profile["username"]),),
		    'order_by' => array('updated_at' => 'desc'),));	

		$data["subnav"] = array('preferences'=> 'active' );
		
		$this->template->title = "Your Preferences";
		$this->template->content = View::forge('preferences/index', $data);

		    
		}else{

			// If no user is logged in, preferences redirects home
			Response::redirect('home');
		}

		// If either button was pushed on the page, then...
		if (Input::post()){

			$name = $user_profile["username"];	

			// 'filter' is what the user wishes to filter i.e. title was entered into input field
			if(Input::post('filter')){
			
	    	$filter = Input::post('filter');

	    	// Creates database entry to be added
	    	$preference = Model_Preference::forge(array(
					'username' => $name,
					'filter' => $filter,
				));

	    	// Adds entry to database and refreshes page
				if ($preference and $preference->save())
				{
					Session::set_flash('success', 'Added '.$preference->filter.' to your filter.');

					Response::redirect('preferences');
				}

				else
				{
					Session::set_flash('error', 'Could not save preference.');
				}
			}

			// 'filtered' is the title or titles already filtered that the user wishes to remove i.e. user checked boxes.
			// This is an array since multiple checkboxes can be checked.
			if(Input::post('filtered')){
				$filtered = Input::post('filtered');
				foreach($filtered as $game){

					// Fetches all database entries with this title for the current user
					$record = Model_Preference::find('all', array(
				    'where' => array(
				    	array('username', $name),array('filter', $game)),
				    ));	

					// Deletes the found entries - there could be more than one. 
				    foreach($record as $record){
				    	$record->delete();
				    }
				    
				}
				// Moved outside of foreach loop for defect 1
				Response::redirect('preferences');
			}
		}

	}

}
