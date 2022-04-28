<?php
Class M_cover extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';
		$limit = isset($params["limit"])?$params["limit"]:'';
		$status = isset($params["status"])?$params["status"]:'';

		$conditional = " WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}
		if($status != '') {
			$conditional .= "AND status = '".$this->db->escape_str($status)."'";
		}
		if($limit != '') {
			$conditional .= "limit 0,".$this->db->escape_str($limit)."";
		}

		$mysql = "select * from cover ".$conditional." order by id DESC";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}

	public function insertData($params=array()){
		$data ['id'] = "Null";
		$data ['title'] = isset($params["title"])?$params["title"]:'';
		$data ['summary'] = isset($params["summary"])?$params["summary"]:'';
		$data ['image'] = isset($params["image"])?$params["image"]:'';
		$data ['status'] = isset($params["status"])?$params["status"]:'';

		$insert = $this->db->insert('cover', $data);
		if($insert){
			return 'success';
		} else {
			return 'failed';
		}
	}

	public function updateData($params=array()){
		$id = isset($params["id"])?$params["id"]:'';
		$title = isset($params["title"])?$params["title"]:'';
		$summary = isset($params["summary"])?$params["summary"]:'';
		$image = isset($params["image"])?$params["image"]:'';
		$status = isset($params["status"])?$params["status"]:'';

		$data = "
			title = '".$this->db->escape_str($title)."'
			,summary = '".$this->db->escape_str($summary)."'
			,image = '".$this->db->escape_str($image)."'
			,status = '".$this->db->escape_str($status)."'
		";
					
		$select = $this->db->query("
			UPDATE cover
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
		$this->db->delete('cover');
	}
}
?>
