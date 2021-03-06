<?php
Class M_category extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';
		$slug = isset($params["slug"])?$params["slug"]:'';

		$conditional = " WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}
		if($slug != '') {
			$conditional .= "AND slug = '".$this->db->escape_str($slug)."'";
		}

		$mysql = "select * from category ".$conditional." order by id DESC";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
	
	public function insertData($params=array()){
		$data ['id'] = "Null";
		$data ['title'] = isset($params["title"])?$params["title"]:'';
		$data ['slug'] = isset($params["slug"])?$params["slug"]:'';
		$data ['description'] = isset($params["description"])?$params["description"]:'';
		$data ['status'] = isset($params["status"])?$params["status"]:'';

		$insert = $this->db->insert('category', $data);
		if($insert){
			return 'success';
		} else {
			return 'failed';
		}
	}

	public function updateData($params=array()){
		$id = isset($params["id"])?$params["id"]:'';
		$title = isset($params["title"])?$params["title"]:'';
		$slug = isset($params["slug"])?$params["slug"]:'';
		$description = isset($params["description"])?$params["description"]:'';
		$status = isset($params["status"])?$params["status"]:'';

		$data = "
			title = '".$this->db->escape_str($title)."'
			,slug = '".$this->db->escape_str($slug)."'
			,description = '".$this->db->escape_str($description)."'
			,status = '".$this->db->escape_str($status)."'
		";
					
		$select = $this->db->query("
			UPDATE category
			SET
				".$data."
			WHERE
				id = ".$this->db->escape_str($id)."
		");

		if($select){
			return 'success';
		} else {
			return 'failed';
		}
	}

	function delete_data($id){
		$this->db->where('id', $id);
		$this->db->delete('category');
	}
}
?>
