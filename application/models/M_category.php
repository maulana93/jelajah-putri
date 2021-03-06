<?php
Class M_category extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';

		$conditional = " WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}

		$mysql = "select * from category ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
	
	public function insertData($params=array()){
		$data ['id'] = "Null";
		$data ['title'] = isset($params["title"])?$params["title"]:'';
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
		$status = isset($params["status"])?$params["status"]:'';

		$data = "
			title = '".$this->db->escape_str($title)."'
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
