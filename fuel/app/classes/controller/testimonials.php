<?php

class Controller_Testimonials extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('testimonials'=> 'active' );
		$this->template->title = 'Testimonials';
		$this->template->content = View::forge('testimonials/index', $data);
	}

}
