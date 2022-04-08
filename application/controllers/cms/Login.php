<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_user'),'',TRUE);
	$this->load->library(array('form_validation','encrypt','session'));
}
	public function index()
	{
		if($this->input->post('login'))
		{			
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->m_user->login($email);
			$data['pass'] = "";
			$data['email'] = "";
			if(!empty($user))
			{
				foreach ($user as $row_user)
				{
					$password_2 = $row_user->password;
					
					if ($password_2 == $password)
					{
						$id = $row_user -> id;
						$fullname = $row_user -> fullname;
						$email = $row_user -> email;							
						
						$this->session->set_userdata('SESSION_ID', $id);
						$this->session->set_userdata('SESSION_EMAIL', $email);
						$this->session->set_userdata('SESSION_NAME', $fullname);
						
						redirect(base_url().'cms/dashboard','refresh');
					}
					else
					{
						$alert="Password Salah";
						$data['alert'] = $alert;
						$data['email'] = $email;
						$this->session->sess_destroy();
						$this->load->view('cms/login',$data);
					}
					
				}				
			}
			else
			{
				$alert="Anda Belum Terdaftar";
				$data['alert'] = $alert;
				$this->session->sess_destroy();
				$this->load->view('cms/login',$data);
			}
			
		}
		else
		{
			$data['title'] = 'CMS Jelajahputri';
			$data['alert'] = '';
			$this->load->view('cms/login',$data);
		}
	}
}
