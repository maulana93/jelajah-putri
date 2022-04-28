<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//get query
		$this->load->model(array('cms/m_user','cms/m_category'),'',TRUE);
		$this->load->library(array('form_validation','session'));	

		if(!$this->session->userdata('SESSION_ID')){
			redirect(base_url().'login');
		}
	}
	public function index()
	{
		$data['title'] = 'Kategori Jelajahputri';
		$data['active_menu'] = '3';
		$data['lists'] = $this->m_category->listdata();
		$this->load->view('cms/category/index',$data);
	}
	public function add()
	{
		$data['title'] = 'Kategori Jelajahputri';
		$data['active_menu'] = '3';

		if($this->input->post('simpan'))
		{
			$title = $this->input->post('title');
			$slug_input = str_replace(' ', '-',$title);
			$slug_filter = preg_replace('/[^A-Za-z0-9\-]/', '',$slug_input);
			$slug = strtolower($slug_filter);		
			$description = $this->input->post('description');
			$status = $this->input->post('status');

			$data['title_category'] = $title;
			$data['description'] = $description;
			$data['status'] = $status;

			$data['lists'] = $this->m_category->listdata(array('slug'=>$slug));
			if(isset($data['lists']) && count($data['lists'])>0){
				$data['alert'] = 'Kategori sudah ada, gunakan nama yang lain.';
				$this->load->view('cms/category/add',$data);
			} else {
				$insert = $this->m_category->insertData(array(
					'title' => $title
					,'slug' => $slug
					,'description' => $description
					,'status' => $status
				));
							
				redirect(base_url().'cms/category');
			}						
		}
		else {
			$this->load->view('cms/category/add',$data);
		}		
	}
	public function edit($id='')
	{
		$data['title'] = 'Kategori Jelajahputri';
		$data['active_menu'] = '3';

		if($this->input->post('simpan'))
		{			
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$slug_input = str_replace(' ', '-',$title);
			$slug_filter = preg_replace('/[^A-Za-z0-9\-]/', '',$slug_input);
			$slug = strtolower($slug_filter);		
			$description = $this->input->post('description');
			$status = $this->input->post('status');

			$data['id'] = $id;
			$data['title_category'] = $title;
			$data['description'] = $description;
			$data['status'] = $status;

			$data['lists'] = $this->m_category->listdata(array('slug'=>$slug));
			if(isset($data['lists']) && count($data['lists'])>0){
				if($data['lists'][0]['id'] == $id){
					$update = $this->m_category->updateData(array(
						'id' => $id
						,'title'=>$title
						,'slug' => $slug
						,'description' => $description
						,'status'=>$status
					));
								
					redirect(base_url().'cms/category');
				} else {
					$data['alert'] = 'Kategori sudah ada, gunakan nama yang lain.';
					$this->load->view('cms/category/edit',$data);
				}				
			} else {
				$update = $this->m_category->updateData(array(
					'id' => $id
					,'title'=>$title
					,'slug' => $slug
					,'description' => $description
					,'status'=>$status
				));
							
				redirect(base_url().'cms/category');
			}				
		}
		else
		{
			$data['id'] = $id;	
			$data['lists'] = $this->m_category->listData(array('id'=>$id));
			// echo "<pre>";var_dump($data['lists']);exit();

			$data['alert'] = '';
			$this->load->view('cms/category/edit',$data);
		}
	}
	public function delete($id)
	{			
		$this->m_category->delete_data($id);
		redirect(base_url('cms/category'));		
	}
}
