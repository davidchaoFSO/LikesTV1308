<?php
class Controller_Preferences extends Controller_Template{

	public function action_index()
	{
		$data['preferences'] = Model_Preference::find('all');
		$data["subnav"] = array('preferences'=> 'active' );
		$this->template->title = "Your Preferences";
		$this->template->content = View::forge('preferences/index', $data);

	}

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
					'email' => Input::post('email'),
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
			$preference->email = Input::post('email');
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
				$preference->email = $val->validated('email');
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


}
