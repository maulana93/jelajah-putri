<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kanal extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
	$this->load->model(array('m_kanal'),'',TRUE);
	$this->load->helper(array('text_helper'),'',TRUE);		
}
	public function index($slug = "")
	{
		$data['menu_active'] = $slug;
		$data['listsKanal'] = $this->m_kanal->listdata(array('slug'=>$slug));

		$id_category = isset($data['listsKanal'][0]['id'])?$data['listsKanal'][0]['id']:'';
		$title_category = isset($data['listsKanal'][0]['title'])?$data['listsKanal'][0]['title']:'';
		$data['listsContent'] = $this->m_kanal->listContent(array('id_category'=>$id_category));
		$data['title'] = 'Jelajah Putri - '.$title_category;
		// echo "<pre>";var_dump($data['listsKanal']);exit();
		$this->load->view('kanal',$data);
	}
	function getAllDataNext(){
		$tdata = array();
		$id_kanal = htmlspecialchars($this->input->post('id_kanal'));
		$current_value = htmlspecialchars($this->input->post('current_value'));
		$array_exclude = htmlspecialchars($this->input->post('array_exclude'));
		$arr_exclude =  isset($array_exclude)?explode(",", $array_exclude):array();

		$tdata['listartikelkanal'] = $this->ContentModel->listArticlev3(array('id_kanal'=>$this->webconfig['kanal-id-berita'],'slug'=>$tdata['slugkanal'],'limit'=>$this->webconfig['limit_artikel_kanal_berita'],'last_artikel'=>$current_value,'arr_exclude'=>$arr_exclude));
		$arr_exclude= array();
		foreach ($tdata['listartikelkanal'] as $key => $value) {
			$arr_exclude[] = $value['id'];
		}
		$tdata['array_exclude2'] = implode(",", $arr_exclude);
		$this->load->view($this->router->class.'/kanalnext',$tdata);
	}
}
