<?php

class Controller_Channels extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('channels'=> 'active' );
		$this->template->title = 'Your Recommended Channels';
		$this->template->content = View::forge('channels/index', $data);
	}

}
