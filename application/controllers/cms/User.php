<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//get query
		$this->load->model(array('cms/m_user'),'',TRUE);
		$this->load->library(array('form_validation','session'));

		if(!$this->session->userdata('SESSION_ID')){
			redirect(base_url().'login');
		}	
	}
	public function index()
	{
		$data['title'] = 'User - Jelajahputri';
		$data['active_menu'] = '7';
		$data['lists'] = $this->m_user->listdata();
		$this->load->view('cms/user/index',$data);
	}
	public function add()
	{
		$data['title'] = 'User - Jelajahputri';
		$data['active_menu'] = '7';

		if($this->input->post('simpan'))
		{
			$fullname = $this->input->post('fullname');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');
			$role = $this->input->post('role');
			$status = $this->input->post('status');

			$data['fullname'] = $fullname;
			$data['email'] = $email;
			$data['role'] = $role;
			$data['status'] = $status;
			
			$data['lists'] = $this->m_user->listdata(array('email'=>$email));
			if(isset($data['lists']) && count($data['lists'])>0){
				$data['alert'] = 'Email sudah terdaftar, harap gunakan email yang lain.';
				$this->load->view('cms/user/add',$data);
			} else {
				if($password == $confirm_password){
					$insert = $this->m_user->insertData(array(
						'fullname' => $fullname
						,'email' => $email
						,'password' => md5($password)
						,'role' => $role
						,'status' => $status
					));
					redirect(base_url().'cms/user');	
				} else{
					$data['alert'] = 'Password dan Confirm Password tidak sesuai';
					$this->load->view('cms/user/add',$data);
				}		
			}			
		}
		else {
			$this->load->view('cms/user/add',$data);
		}		
	}
	public function edit($id='')
	{
		$data['title'] = 'User - Jelajahputri';
		$data['active_menu'] = '7';

		if($this->input->post('simpan'))
		{			
			$id = $this->input->post('id');
			$fullname = $this->input->post('fullname');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$confirm_password = $this->input->post('confirm_password');
			$role = $this->input->post('role');
			$status = $this->input->post('status');

			$data['fullname'] = $fullname;
			$data['email'] = $email;
			$data['role'] = $role;
			$data['status'] = $status;

			if($password == $confirm_password){
				$update = $this->m_user->updateData(array(
					'id' => $id
					,'fullname' => $fullname
					,'email' => $email
					,'password' => md5($password)
					,'role' => $role
					,'status' => $status
				));
							
				redirect(base_url().'cms/user');
			} else {
				$data['alert'] = 'Password dan Confirm Password tidak sesuai';
				$data['lists'] = $this->m_user->listData(array('id'=>$id));
				$this->load->view('cms/user/edit',$data);
			}	
					
		}
		else
		{
			$data['lists'] = $this->m_user->listData(array('id'=>$id));
			// echo "<pre>";var_dump($data['lists']);exit();

			$data['alert'] = '';
			$this->load->view('cms/user/edit',$data);
		}
	}
	public function delete($id)
	{			
		$this->m_user->delete_data($id);
		redirect(base_url('cms/user'));		
	}
}
