<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('cms/m_user','cms/m_content','cms/m_category'),'',TRUE);
	$this->load->library(array('form_validation','encrypt','session'));	
}
	public function index()
	{
		$data['title'] = 'Content Jelajahputri';
		$data['active_menu'] = '4';
		$data['lists'] = $this->m_content->listdata();
		$this->load->view('cms/content/index',$data);
	}
	public function add()
	{
		$data['title'] = 'Content Jelajahputri';
		$data['active_menu'] = '4';

		if($this->input->post('simpan'))
		{
			$title = $this->input->post('title');
			$slug_input = str_replace(' ', '-',$title);
			$slug_filter = preg_replace('/[^A-Za-z0-9\-]/', '',$slug_input);
			$slug = strtolower($slug_filter);		
			$id_category = $this->input->post('category');
			$summary = $this->input->post('summary');
			$body = $this->input->post('body');
			$id_user = $this->session->userdata('SESSION_ID');
			$is_headline = $this->input->post('headline');
			$datecreated = date("Y-m-d H:i:s");
			$image = $_FILES["image"]["name"];
			$status = $this->input->post('status');
			$title_image = md5($title);

			$path = 'assets/images/articles';
			$ext = pathinfo($image, PATHINFO_EXTENSION);
			$file_name = date("Y-m-d-H-i-s").$title_image.'-'.'.'.$ext;
			$path_image = $path.'/'.$file_name;

			$insert = $this->m_content->insertData(array(
				'title' => $title
				,'slug' => $slug
				,'id_category' => $id_category
				,'summary' => $summary
				,'body' => $body
				,'id_user' => $id_user
				,'is_headline' => $is_headline
				,'datecreated' => $datecreated
				,'image' => $path_image
				,'status' => $status
			  ));

			if($insert == 'success'){
				$this->upload_photo('image',$file_name,$path);
			}			
						
			redirect(base_url().'cms/content');			
		}
		else {
			$data['cover'] = $this->m_content->listdata();
			$data['category'] = $this->m_category->listdata();
			$this->load->view('cms/content/add',$data);
		}		
	}
	public function edit($id='')
	{
		$data['title'] = 'Content Jelajahputri';
		$data['active_menu'] = '4';

		if($this->input->post('simpan'))
		{			
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$slug_input = str_replace(' ', '-',$title);
			$slug_filter = preg_replace('/[^A-Za-z0-9\-]/', '',$slug_input);
			$slug = strtolower($slug_filter);		
			$id_category = $this->input->post('category');
			$summary = $this->input->post('summary');
			$body = $this->input->post('body');
			$id_user = $this->session->userdata('SESSION_ID');
			$is_headline = $this->input->post('headline');
			$status = $this->input->post('status');
			$title_image = md5($title);

			$image = $_FILES["image"]["name"];
			$path = 'assets/images/articles';
			$ext = pathinfo($image, PATHINFO_EXTENSION);
			$file_name = date("Y-m-d-H-i-s").$title_image.'-'.'.'.$ext;
			$path_image = $path.'/'.$file_name;

			if($image == ''){
				$path_image = $this->input->post('image_existing');
			}

			$update = $this->m_content->updateData(array(
				'id' => $id
				,'title' => $title
				,'slug' => $slug
				,'id_category' => $id_category
				,'summary' => $summary
				,'body' => $body
				,'id_user' => $id_user
				,'is_headline' => $is_headline
				,'image' => $path_image
				,'status'=>$status
			));

			if(!empty($image)){
				if($update == 'success'){
					$this->upload_photo('image',$file_name,$path);
				}	
			}	
						
			redirect(base_url().'cms/content');					
		}
		else
		{
			$data['lists'] = $this->m_content->listData(array('id'=>$id));
			$data['category'] = $this->m_category->listdata();
			// echo "<pre>";var_dump($data['lists']);exit();

			$data['alert'] = '';
			$this->load->view('cms/content/edit',$data);
		}
	}
	public function delete($id)
	{			
		$this->m_content->delete_data($id);
		redirect(base_url('cms/content'));		
	}
	private function upload_photo($files='',$file_name='',$path='')
	{		
		$this->load->library(array('upload'));

		if(!is_dir($path)){
		mkdir($path,0777,FALSE);
		//copy index.html
		//copy("./support/index.html",$path."index.html");
		}
				
		if($_FILES[$files]['error']==4)  //if No file was uploaded. 
        return false;        
        $config['upload_path'] = $path;
        if(!empty($file_name)){$config['file_name'] = $file_name;}
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        //$config['encrypt_name']        = TRUE;
        $config['overwrite']        = TRUE;
        $config['remove_spaces']	= TRUE;
        //$config['max_size']        = 1024;         
        //$config['max_width']      = 4096;
        //$config['max_height']     = 768;
        
        $this->upload->initialize($config);
		
        $this->upload->do_upload($files);        
	}
}
