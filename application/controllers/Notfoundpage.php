<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfoundpage extends CI_Controller {
public function __construct()
{
	parent::__construct();
	//get query
}
	public function index()
	{
		$data['title'] = 'Jelajah Putri - Notfoundpage';
		$this->load->view('notfoundpage',$data);
	}
}
