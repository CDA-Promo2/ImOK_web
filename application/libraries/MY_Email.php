<?php

class MY_Email extends CI_Email {

	public function send_employee_welcome($user,$random_password){

		$data['user'] = $user;
		$data['random_password'] = $random_password;

		$this->ci = & get_instance();
		$message = $this->ci->load->view('email/newEmployee',$data,TRUE);

		$this->set_newline("\r\n")
			->from('equipe.imok@gmail.com')
			->to($user->mail)
			->subject('IMOK: Bienvenue parmis nous '.$user->firstname)
			->message($message)
			->send();
	}

}
