<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//get query
		$this->load->model(array('cms/m_user','cms/m_category'),'',TRUE);
		$this->load->library(array('form_validation','session'));	
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
			$slug = $this->input->post('slug');
			$description = $this->input->post('description');
			$status = $this->input->post('status');

			$insert = $this->m_category->insertData(array(
				'title' => $title
				,'slug' => $slug
				,'description' => $description
				,'status' => $status
			));
						
			redirect(base_url().'cms/category');			
		}
		else {
			$data['cover'] = $this->m_category->listdata();
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
			$slug = $this->input->post('slug');
			$description = $this->input->post('description');
			$status = $this->input->post('status');

			$update = $this->m_category->updateData(array(
				'id' => $id
				,'title'=>$title
				,'slug' => $slug
				,'description' => $description
				,'status'=>$status
			));
						
			redirect(base_url().'cms/category');					
		}
		else
		{
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
