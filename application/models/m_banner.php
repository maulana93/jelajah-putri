<?php
Class M_banner extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';

		$conditional = " WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}

		$mysql = "select * from banner ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
	
	public function insertData($params=array()){
		$data ['id'] = "Null";
		$data ['title'] = isset($params["title"])?$params["title"]:'';
		$data ['url'] = isset($params["url"])?$params["url"]:'';
		$data ['image'] = isset($params["image"])?$params["image"]:'';
		$data ['status'] = isset($params["status"])?$params["status"]:'';

		$insert = $this->db->insert('banner', $data);
		if($insert){
			return 'success';
		} else {
			return 'failed';
		}
	}

	public function updateData($params=array()){
		$id = isset($params["id"])?$params["id"]:'';
		$title = isset($params["title"])?$params["title"]:'';
		$url = isset($params["url"])?$params["url"]:'';
		$image = isset($params["image"])?$params["image"]:'';
		$status = isset($params["status"])?$params["status"]:'';

		$data = "
			title = '".$this->db->escape_str($title)."'
			,url = '".$this->db->escape_str($url)."'
			,image = '".$this->db->escape_str($image)."'
			,status = '".$this->db->escape_str($status)."'
		";
					
		$select = $this->db->query("
			UPDATE banner
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
		$this->db->delete('banner');
	}
}
?>
