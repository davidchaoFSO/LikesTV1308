<?php

require_once APPPATH.'facebook.php';

class Controller_Preferences extends Controller_Template{



	public function action_index()
	{
		$facebook = new Facebook(array(
	  	'appId' => '515649145162571',
	  	'secret' => '46c7fe25ef7c1c7e03059024049d676f',
		));

		// Grabs facebook user, if it exists. This is a check to see if user is logged in
		$user = $facebook->getUser();
		$data = array();
		$sessionlogout = 'http://likestv.gopagoda.com/logout';

		if ($user){

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

	
	/*

	WILL BE DELETED ONCE IT IS CONFIRMED SAFE TO BE REMOVED

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('preferences');

		if ( ! $data['preference'] = Model_Preference::find($id))
		{
			Session::set_flash('error', 'Could not find preference #'.$id);
			Response::redirect('preferences');
		}

		$this->template->title = "Preference";
		$this->template->content = View::forge('preferences/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Preference::validate('create');
			
			if ($val->run())
			{
				$preference = Model_Preference::forge(array(
					'username' => Input::post('username'),
					'filter' => Input::post('filter'),
				));

				if ($preference and $preference->save())
				{
					Session::set_flash('success', 'Added preference #'.$preference->id.'.');

					Response::redirect('preferences');
				}

				else
				{
					Session::set_flash('error', 'Could not save preference.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Preferences";
		$this->template->content = View::forge('preferences/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('preferences');

		if ( ! $preference = Model_Preference::find($id))
		{
			Session::set_flash('error', 'Could not find preference #'.$id);
			Response::redirect('preferences');
		}

		$val = Model_Preference::validate('edit');

		if ($val->run())
		{
			$preference->username = Input::post('username');
			$preference->filter = Input::post('filter');

			if ($preference->save())
			{
				Session::set_flash('success', 'Updated preference #' . $id);

				Response::redirect('preferences');
			}

			else
			{
				Session::set_flash('error', 'Could not update preference #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$preference->username = $val->validated('username');
				$preference->filter = $val->validated('filter');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('preference', $preference, false);
		}

		$this->template->title = "Preferences";
		$this->template->content = View::forge('preferences/edit');

	}

	public function action_delete($id = null)
	{
		$facebook = new Facebook(array(
	  	'appId' => '515649145162571',
	  	'secret' => '46c7fe25ef7c1c7e03059024049d676f',
		));

		$user = $facebook->getUser();

		if(!($user))
		{
			$id = null;
		}

		is_null($id) and Response::redirect('preferences');

		if ($preference = Model_Preference::find($id))
		{
			$preference->delete();

			Session::set_flash('success', 'Deleted preference #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete preference #'.$id);
		}

		Response::redirect('preferences');

	}

	*/
}
