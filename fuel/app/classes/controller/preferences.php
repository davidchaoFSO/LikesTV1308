<?php

require_once APPPATH.'facebook.php';

class Controller_Preferences extends Controller_Template{



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

		$data['preferences'] = Model_Preference::find('all', array(
		    'where' => array(array('username', $user_profile["username"]),),
		    'order_by' => array('updated_at' => 'desc'),));	

		$data["subnav"] = array('preferences'=> 'active' );
		
		$this->template->title = "Your Preferences";
		$this->template->content = View::forge('preferences/index', $data);

		    
		}else{
			Response::redirect('home');
		}
		if (Input::post()){

			$name = $user_profile["username"];	

			if(Input::post('filter')){
			
	    	$filter = Input::post('filter');

	    	$preference = Model_Preference::forge(array(
					'username' => $name,
					'filter' => $filter,
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
			if(Input::post('filtered')){
				$filtered = Input::post('filtered');
				foreach($filtered as $game){
					$record = Model_Preference::find('all', array(
				    'where' => array(
				    	array('username', $name),array('filter', $game)),
				    ));	

				    foreach($record as $record){
				    	$record->delete();
				    }
				    
				    Response::redirect('preferences');

				    
				}
			}
		}

	}

	//View is not used
	/*
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
