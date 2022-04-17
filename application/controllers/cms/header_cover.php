<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_cover extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('cms/m_user','cms/m_cover'),'',TRUE);
	$this->load->library(array('form_validation','session'));	
}
	public function index()
	{
		$data['title'] = 'Header Cover Jelajahputri';
		$data['active_menu'] = '2';
		$data['lists'] = $this->m_cover->listdata();
		$this->load->view('cms/cover/index',$data);
	}
	public function add()
	{
		$data['title'] = 'Header Cover Jelajahputri';
		$data['active_menu'] = '2';

		if($this->input->post('simpan'))
		{
			$title = $this->input->post('title');
			$summary = $this->input->post('summary');
			$image = $_FILES["image"]["name"];
			$status = $this->input->post('status');

			$path = 'assets/images/header-cover';
			$ext = pathinfo($image, PATHINFO_EXTENSION);
			$file_name = str_replace(' ','-',$title).'-'.date("Y-m-d-H-i-s").'.'.$ext;
			$path_image = $path.'/'.$file_name;

			$insert = $this->m_cover->insertData(array(
				'title' => $title
				,'summary' => $summary
				,'image' => $path_image
				,'status' => $status
			  ));

			if($insert == 'success'){
				$this->upload_photo('image',$file_name,$path);
			}			
						
			redirect(base_url().'cms/header_cover');			
		}
		else {
			$data['cover'] = $this->m_cover->listdata();
			$this->load->view('cms/cover/add',$data);
		}		
	}
	public function edit($id='')
	{
		$data['title'] = 'Header Cover Jelajahputri';
		$data['active_menu'] = '2';

		if($this->input->post('simpan'))
		{			
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$summary = $this->input->post('summary');
			$status = $this->input->post('status');			

			$image = $_FILES["image"]["name"];
			$path = 'assets/images/header-cover';
			$ext = pathinfo($image, PATHINFO_EXTENSION);
			$file_name = str_replace(' ','-',$title).'-'.date("Y-m-d-H-i-s").'.'.$ext;
			$path_image = $path.'/'.$file_name;

			if($image == ''){
				$path_image = $this->input->post('image_existing');
			}

			$update = $this->m_cover->updateData(array(
				'id' => $id
				,'title'=>$title
				,'summary'=>$summary
				,'image' => $path_image
				,'status'=>$status
			));

			if(!empty($image)){
				if($update == 'success'){
					$this->upload_photo('image',$file_name,$path);
				}	
			}	
						
			redirect(base_url().'cms/header_cover');					
		}
		else
		{
			$data['lists'] = $this->m_cover->listData(array('id'=>$id));
			// echo "<pre>";var_dump($data['lists']);exit();

			$data['alert'] = '';
			$this->load->view('cms/cover/edit',$data);
		}
	}
	public function delete($id)
	{			
		$this->m_cover->delete_data($id);
		redirect(base_url('cms/header_cover'));		
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
