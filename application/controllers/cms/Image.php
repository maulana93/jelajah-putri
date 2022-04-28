<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('cms/m_user','cms/m_image'),'',TRUE);
	$this->load->library(array('form_validation','session'));	

	if(!$this->session->userdata('SESSION_ID')){
		redirect(base_url().'login');
	}
}
	public function index()
	{
		$data['title'] = 'Image Jelajahputri';
		$data['active_menu'] = '6';
		$data['lists'] = $this->m_image->listdata();
		$this->load->view('cms/image/index',$data);
	}
	public function add()
	{
		$data['title'] = 'Image Jelajahputri';
		$data['active_menu'] = '6';

		if($this->input->post('simpan'))
		{
			$title = $this->input->post('title');
			$url = $this->input->post('url');
			$image = $_FILES["image"]["name"];
			$status = $this->input->post('status');

			$title_image = md5($title);
			$path = 'assets/images/in-article';
			$ext = pathinfo($image, PATHINFO_EXTENSION);
			$file_name = date("Y-m-d-H-i-s").$title_image.'.'.$ext;
			$path_image = $path.'/'.$file_name;

			$insert = $this->m_image->insertData(array(
				'title' => $title
				,'image' => $path_image
			  ));

			if($insert == 'success'){
				$this->upload_photo('image',$file_name,$path);
			}			
						
			redirect(base_url().'cms/image');			
		}
		else {
			$data['cover'] = $this->m_image->listdata();
			$this->load->view('cms/image/add',$data);
		}		
	}
	public function edit($id='')
	{
		$data['title'] = 'Image Jelajahputri';
		$data['active_menu'] = '6';

		if($this->input->post('simpan'))
		{			
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$new_image = $_FILES["image"]["name"];

			$title_image = md5($title);
			$path = 'assets/images/in-article';
			$ext = pathinfo($image, PATHINFO_EXTENSION);
			$file_name = date("Y-m-d-H-i-s").$title_image.'.'.$ext;
			$path_image = $path.'/'.$file_name;

			if($new_image == ''){
				$path_image = $this->input->post('image_existing');
			}

			$update = $this->m_image->updateData(array(
				'id' => $id
				,'title'=>$title
				,'image' => $path_image
			));

			if(!empty($new_image)){
				if($update == 'success'){
					$this->upload_photo('image',$file_name,$path);
				}	
			}	
						
			redirect(base_url().'cms/image');					
		}
		else
		{
			$data['lists'] = $this->m_image->listData(array('id'=>$id));
			// echo "<pre>";var_dump($data['lists']);exit();

			$data['alert'] = '';
			$this->load->view('cms/image/edit',$data);
		}
	}
	public function delete($id)
	{			
		$this->m_image->delete_data($id);
		redirect(base_url('cms/image'));		
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
