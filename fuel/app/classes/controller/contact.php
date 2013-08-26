<?php
require APPPATH.'facebook.php'; 
class Controller_Contact extends Controller_Template
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

		if (Input::post()){
			$email = Email::forge();
			$from = Input::post('emaddress');
			$body = Input::post('message');

			// Set the from address
			$email->from($from);

			// Set the to address
			$email->to('dcwebtesting@gmail.com');

			// Set a subject
			$email->subject('LikesTV Feedback');

			// And set the body.
			$message = 'From '.$from.': '.$body;
			$email->body($message);

			try
			{
			    if($email->send()){
			    	Session::set_flash('success', 'Your email has been successfully sent!');
			    }else{
			    	Session::set_flash('error', 'Your email was not sent for an unknown reason. Please try again later.');
			    }
			}
			catch(\EmailValidationFailedException $e)
			{
			    // The validation failed
			    error_log('mail did not validate');
			    error_log($e);
			}
			catch(\EmailSendingFailedException $e)
			{
			    // The driver could not send the email
			    error_log('driver could not send mail');
			    error_log($e);
			}
		}



		$data["subnav"] = array('contact'=> 'active' );
		$this->template->title = 'Contact Us';
		$this->template->content = View::forge('contact/index', $data);
	}

}
