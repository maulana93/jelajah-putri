<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_cover extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_user','m_cover'),'',TRUE);
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
			$image = str_replace(' ','_',$image);
			$status = $this->input->post('status');

			$path = 'assets/images/header-cover';

			$insert = $this->m_cover->insertData(array(
				'title' => $title
				,'summary' => $summary
				,'image' => $path.'/'.$image
				,'status' => $status
			  ));

			if($insert == 'success'){
				$this->upload_photo('image',$image,$path);
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
			$new_image = $_FILES["image"]["name"];
			$image = str_replace(' ','_',$new_image);
			$path = 'assets/images/header-cover';
			$image = $path.'/'.$image;

			if($image == ''){
				$image = $this->input->post('image_existing');
			}
			$status = $this->input->post('status');

			$update = $this->m_cover->updateData(array(
				'id' => $id
				,'title'=>$title
				,'summary'=>$summary
				,'image' => $image
				,'status'=>$status
			));

			if(!empty($new_image)){
				if($update == 'success'){
					$this->upload_photo('image',$image,$path);
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
