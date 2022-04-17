<?php
Class M_content extends CI_Model
{
	public function listdata($params=array())
	{
		$id = isset($params["id"])?$params["id"]:'';

		$conditional = " WHERE 1=1 ";

		if($id != '') {
			$conditional .= "AND id = '".$this->db->escape_str($id)."'";
		}

		$mysql = "select * from content ".$conditional."";
		$q = $this->db->query($mysql);
		$result = $q->result_array();
		return $result;
	}
	
	public function insertData($params=array()){
		$data ['id'] = "Null";
		$data ['title'] = isset($params["title"])?$params["title"]:'';
		$data ['id_category'] = isset($params["id_category"])?$params["id_category"]:'';
		$data ['summary'] = isset($params["summary"])?$params["summary"]:'';
		$data ['body'] = isset($params["body"])?$params["body"]:'';
		$data ['id_user'] = isset($params["id_user"])?$params["id_user"]:'';
		$data ['is_headline'] = isset($params["is_headline"])?$params["is_headline"]:'';
		$data ['datecreated'] = isset($params["datecreated"])?$params["datecreated"]:'';
		$data ['image'] = isset($params["image"])?$params["image"]:'';
		$data ['status'] = isset($params["status"])?$params["status"]:'';

		$insert = $this->db->insert('content', $data);
		if($insert){
			return 'success';
		} else {
			return 'failed';
		}
	}

	public function updateData($params=array()){
		$id = isset($params["id"])?$params["id"]:'';
		$title = isset($params["title"])?$params["title"]:'';
		$id_category = isset($params["id_category"])?$params["id_category"]:'';
		$summary = isset($params["summary"])?$params["summary"]:'';
		$body = isset($params["body"])?$params["body"]:'';
		$id_user = isset($params["id_user"])?$params["id_user"]:'';
		$is_headline = isset($params["is_headline"])?$params["is_headline"]:'';
		$image = isset($params["image"])?$params["image"]:'';
		$status = isset($params["status"])?$params["status"]:'';

		$data = "
			title = '".$this->db->escape_str($title)."'
			,id_category = '".$this->db->escape_str($id_category)."'
			,summary = '".$this->db->escape_str($summary)."'
			,body = '".$this->db->escape_str($body)."'
			,id_user = '".$this->db->escape_str($id_user)."'
			,is_headline = '".$this->db->escape_str($is_headline)."'
			,image = '".$this->db->escape_str($image)."'
			,status = '".$this->db->escape_str($status)."'
		";
					
		$select = $this->db->query("
			UPDATE content
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
		$this->db->delete('content');
	}
}
?>
